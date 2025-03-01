<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccessMail;

class MidtransWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Validasi payload dari Midtrans
        $serverKey = config('midtrans.serverKey');
        $signatureKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($signatureKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Ambil data dari notifikasi
        $transactionStatus = $request->transaction_status;
        $orderId = $request->order_id;

        // Cari payment berdasarkan order_id
        $payment = Payment::where('order_id', $orderId)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Update status pembayaran berdasarkan status transaksi
        if ($transactionStatus === 'settlement') {
            $payment->status = 'completed';

            // Update status order menjadi "paid"
            $order = Order::find($payment->order_id);
            $order->payment_status = 'paid';
            $order->status = 'processing';
            $order->save();
            // Setelah pembayaran sukses, kirim email
            Mail::to($order->customer->email)->send(new PaymentSuccessMail($order));

            // Kirim email ke admin_penjualan
            Mail::to('admin_penjualan@gmail.com')->send(new PaymentSuccessMail($order));
        } elseif (in_array($transactionStatus, ['pending', 'deny', 'expire', 'cancel'])) {
            $payment->status = $transactionStatus;
        }

        $payment->save();

        return response()->json(['message' => 'Webhook processed successfully']);
    }
}
