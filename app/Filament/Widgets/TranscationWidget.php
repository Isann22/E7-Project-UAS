<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;

class TranscationWidget extends ChartWidget
{
    protected static ?string $heading = 'Order Chart';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Fetch order data grouped by month
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare the data for the chart
        $labels = [];
        $data = [];

        foreach ($orders as $order) {
            $labels[] = date('F', mktime(0, 0, 0, $order->month, 10)); // Get the month name
            $data[] = $order->count;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $data,
                    'borderColor' => '#42A5F5',
                    'backgroundColor' => 'rgba(66, 165, 245, 0.2)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
