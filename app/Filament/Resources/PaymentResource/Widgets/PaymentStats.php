<?php

namespace App\Filament\Resources\PaymentResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentStats extends ChartWidget
{
    protected static ?string $heading = 'Payment Trends';

    /**
     * Mendapatkan data untuk grafik.
     */
    protected function getData(): array
    {
        // Ambil data pembayaran dengan status "completed" dari 12 bulan terakhir
        $payments = Payment::query()
            ->selectRaw('DATE_FORMAT(payment_date, "%Y-%m") as month, SUM(amount) as total')
            ->where('status', 'completed') // Tambahkan filter status
            ->where('payment_date', '>=', Carbon::now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format data untuk grafik
        $labels = [];
        $data = [];

        foreach ($payments as $payment) {
            $labels[] = Carbon::createFromFormat('Y-m', $payment->month)->format('F Y'); // Format bulan (e.g., "January 2025")
            $data[] = $payment->total;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Payments',
                    'data' => $data,
                    'borderColor' => '#4A90E2',
                    'backgroundColor' => 'rgba(74, 144, 226, 0.3)',
                ],
            ],
        ];
    }

    /**
     * Menentukan jenis grafik.
     */
    protected function getType(): string
    {
        return 'line'; // Grafik garis
    }
}
