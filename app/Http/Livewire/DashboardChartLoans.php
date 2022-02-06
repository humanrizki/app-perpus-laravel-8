<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\DB;
class DashboardChartLoans extends Component
{
    public $contentTitle = 'Data User yang sedang, atau batal melakukan peminjaman di aplikasi Library CN';
    public $user;
    public $temps;
    public $totals;
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
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnColumnClick($column)
    {
        // dd($column);
        $this->column = $column;
        $this->temps = DB::table('loan_reports')
        ->leftJoin('users','loan_reports.user_id','users.id')
        ->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')
        ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id')
        ->where('department',$this->column['title'])->select('*')->groupBy('user_id')->get();
        $userTemp = DB::table('loan_reports')
        ->leftJoin('users','loan_reports.user_id','users.id')
        ->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')
        ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id')
        ->where('department',$this->column['title'])->get();
        $this->totals = array_count_values($userTemp->pluck('user_id')->toArray());
    }
    public function render()
    {
        $this->user = \App\Models\LoanReport::leftJoin('users','loan_reports.user_id','users.id')->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
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
        return view('livewire.dashboard-chart-loans',[
            'columnChartModel'=>$columnChartModel
        ]);
    }
}
