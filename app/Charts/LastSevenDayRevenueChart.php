<?php

namespace App\Charts;

use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\BarChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LastSevenDayRevenueChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        for ($i = 0; $i < 7; $i++)
        {
            $money = \App\Models\Receipt::selectRaw('sum(money) as sum')
                                            ->whereDate(
                                                'created_at',
                                                '=',
                                                Carbon::now()->subDays(6 - $i)->toDateString()
                                            )->get();

            $total[$i] = $money[0]->sum ?? 0;
        }
        // ddd(\App\Models\Receipt::selectRaw('sum(money) as sum')->whereDate('created_at', '=', Carbon::now()->subDays($i))->get());
        // ddd($total);

        return $this->chart->barChart()
            ->setTitle('Đơn vị (VND)')
            ->addData('Doanh thu', $total)
            ->setXAxis([
                Carbon::now()->subDays(6)->toDate()->format('d-m-Y'),
                Carbon::now()->subDays(5)->toDate()->format('d-m-Y'),
                Carbon::now()->subDays(4)->toDate()->format('d-m-Y'),
                Carbon::now()->subDays(3)->toDate()->format('d-m-Y'),
                Carbon::now()->subDays(2)->toDate()->format('d-m-Y'),
                Carbon::now()->subDays(1)->toDate()->format('d-m-Y'),
                Carbon::now()->subDays(0)->toDate()->format('d-m-Y'),
            ])
            ->setGrid();;
    }
}
