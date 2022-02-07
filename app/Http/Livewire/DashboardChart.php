<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\DB;

class DashboardChart extends Component
{
    public $contentTitle = 'Data User yang sudah registrasi ke aplikasi Library CN';
    public $user;
    public $temps;
    public $firstRun = true;
    public $showDataLabels = false;
    protected $listeners = [
        'onColumnClick' => 'handleOnColumnClick',
    ];
    public function handleOnColumnClick($column)
    {
        $this->temps = DB::table('users')
        ->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')
        ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id')
        ->where('department',$column['title'])->get();
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
                ->setColumnWidth(90)
                ->withGrid()
            );
        $this->firstRun = false;
        return view('livewire.dashboard-chart', [
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
