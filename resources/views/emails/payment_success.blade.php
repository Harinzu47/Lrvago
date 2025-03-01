<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Berhasil</title>
</head>
<body>
    <h2>Halo {{ $order->customer->name }},</h2>
    <p>Pembayaran untuk pesanan <strong>#{{ $order->order_id }}</strong> telah berhasil.</p>
    <p>Detail pesanan:</p>
    <ul>
        <li>Jumlah: Rp{{ number_format($order->total_amount, 2, ',', '.') }}</li>
        <li>Status: {{ $order->payment_status }}</li>
    </ul>
    <p>Terima kasih telah berbelanja di Larva Go!</p>
</body>
</html>
