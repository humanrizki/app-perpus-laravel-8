<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\DB;

class DashboardChart extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];
    public $contentTitle = 'Data User yang sudah registrasi ke aplikasi Library CN';
    public $user;
    public $temps;
    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];
    public $column;

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
        // dd($column);
        $this->column = $column;
        $this->temps = DB::table('users')
        ->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')
        ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id')
        ->where('department',$this->column['title'])->get();
    }
    public function render()
    {
        $this->user = \App\Models\User::leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')
        ->get();
        $columnChartModel = $this->user->groupBy('department')
            ->reduce(function ($columnChartModel, $data){
                $type = $data->first()->department;
                    $value = array_count_values($this->user->pluck('department')->toArray())[$type];
                $backgroundColor = $data->first()->backgroundColor;
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
