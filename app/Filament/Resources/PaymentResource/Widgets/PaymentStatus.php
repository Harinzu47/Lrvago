<?php

namespace App\Filament\Resources\PaymentResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Payment;

class PaymentStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Payment Status Distribution';

    /**
     * Mendapatkan data untuk grafik.
     */
    protected function getData(): array
    {
        // Hitung jumlah pembayaran berdasarkan status
        $statuses = Payment::query()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // Siapkan data untuk grafik
        $labels = array_keys($statuses);
        $data = array_values($statuses);

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => [
                        '#4CAF50', // Sukses
                        '#FF5252', // Gagal
                        '#FFC107', // Lainnya
                    ],
                ],
            ],
        ];
    }

    /**
     * Menentukan jenis grafik.
     */
    protected function getType(): string
    {
        return 'pie'; // Grafik Pie
    }
}
