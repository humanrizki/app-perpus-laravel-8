<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
class DashboardChart extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];

    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }
    public function render()
    {
        $user = \App\Models\User::leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')
        ->get();
        $i = 1;
        $columnChartModel = $user->groupBy('department')
            ->reduce(function ($columnChartModel, $data) use ($user, $i) {
                $type = $data->first()->department;
                    $value = array_count_values($user->pluck('department')->toArray())[$type];
                $backgroundColor = $data->first()->backgroundColor;
                $i++;
                return $columnChartModel->addColumn($type, $value, $backgroundColor);
            }, LivewireCharts::columnChartModel()
                ->setTitle('Data User')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled($this->showDataLabels)
                //->setOpacity(0.25)
                ->setColors($this->colors)
                ->setColumnWidth(90)
                ->withGrid()
            );

        // $pieChartModel = $expenses->groupBy('type')
        //     ->reduce(function ($pieChartModel, $data) {
        //         $type = $data->first()->type;
        //         $value = $data->sum('amount');

        //         return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
        //     }, LivewireCharts::pieChartModel()
        //         //->setTitle('Expenses by Type')
        //         ->setAnimated($this->firstRun)
        //         ->withOnSliceClickEvent('onSliceClick')
        //         //->withoutLegend()
        //         ->legendPositionBottom()
        //         ->legendHorizontallyAlignedCenter()
        //         ->setDataLabelsEnabled($this->showDataLabels)
        //         ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
        //     );

        // $lineChartModel = $expenses
        //     ->reduce(function ($lineChartModel, $data) use ($expenses) {
        //         $index = $expenses->search($data);

        //         $amountSum = $expenses->take($index + 1)->sum('amount');

        //         if ($index == 6) {
        //             $lineChartModel->addMarker(7, $amountSum);
        //         }

        //         if ($index == 11) {
        //             $lineChartModel->addMarker(12, $amountSum);
        //         }

        //         return $lineChartModel->addPoint($index, $data->amount, ['id' => $data->id]);
        //     }, LivewireCharts::lineChartModel()
        //         //->setTitle('Expenses Evolution')
        //         ->setAnimated($this->firstRun)
        //         ->withOnPointClickEvent('onPointClick')
        //         ->setSmoothCurve()
        //         ->setXAxisVisible(true)
        //         ->setDataLabelsEnabled($this->showDataLabels)
        //         ->sparklined()
        //     );

        // $areaChartModel = $expenses
        //     ->reduce(function ($areaChartModel, $data) use ($expenses) {
        //         $index = $expenses->search($data);
        //         return $areaChartModel->addPoint($index, $data->amount, ['id' => $data->id]);
        //     }, LivewireCharts::areaChartModel()
        //         //->setTitle('Expenses Peaks')
        //         ->setAnimated($this->firstRun)
        //         ->setColor('#f6ad55')
        //         ->withOnPointClickEvent('onAreaPointClick')
        //         ->setDataLabelsEnabled($this->showDataLabels)
        //         ->setXAxisVisible(true)
        //         ->sparklined()
        //     );

        // $multiLineChartModel = $expenses
        //     ->reduce(function ($multiLineChartModel, $data) use ($expenses) {
        //         $index = $expenses->search($data);

        //         return $multiLineChartModel
        //             ->addSeriesPoint($data->type, $index, $data->amount,  ['id' => $data->id]);
        //     }, LivewireCharts::multiLineChartModel()
        //         //->setTitle('Expenses by Type')
        //         ->setAnimated($this->firstRun)
        //         ->withOnPointClickEvent('onPointClick')
        //         ->setSmoothCurve()
        //         ->multiLine()
        //         ->setDataLabelsEnabled($this->showDataLabels)
        //         ->sparklined()
        //         ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
        //     );

        // $multiColumnChartModel = $expenses->groupBy('type')
        //     ->reduce(function ($multiColumnChartModel, $data) {
        //         $type = $data->first()->type;

        //         return $multiColumnChartModel
        //             ->addSeriesColumn($type, 1, $data->sum('amount'));
        //     }, LivewireCharts::multiColumnChartModel()
        //         ->setAnimated($this->firstRun)
        //         ->setDataLabelsEnabled($this->showDataLabels)
        //         ->withOnColumnClickEventName('onColumnClick')
        //         ->setTitle('Revenue per Year (K)')
        //         ->stacked()
        //         ->withGrid()
        //     );

        $this->firstRun = false;
        return view('livewire.dashboard-chart', [
            'columnChartModel' => $columnChartModel,
                // 'pieChartModel' => $pieChartModel,
                // 'lineChartModel' => $lineChartModel,
                // 'areaChartModel' => $areaChartModel,
                // 'multiLineChartModel' => $multiLineChartModel,
                // 'multiColumnChartModel' => $multiColumnChartModel,
        ]);
    }
}
