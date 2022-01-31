<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DetailClassDepartment;
use App\Models\LoanReport;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardChart extends Controller
{
    //
    public function index(){
        $user = LoanReport::query()
        ->leftJoin('users','users.id','loan_reports.user_id')
        ->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')->get();
        $departmentValues = $user->pluck('department')->toArray();
        $departmentNames = array_values($user->pluck('department')->unique()->toArray());
        // dd($departmentNames);
        return view('admin.chart.chartjs',[
            'title'=>'Page chart'
        ]);
    }
    public function chartPie(){
        $user = User::query()
        ->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')->get();
        $departmentNames = array_values($user->pluck('department')->unique()->toArray());
        $departmentValues = array_values(array_count_values($user->pluck('department')->toArray()));
        $departmentBackgroundColor = array_values($user->pluck('backgroundColor')->unique()->toArray());
        // dd($departmentNames);
        return response()->json([
            'departments'=>$departmentNames,
            'values'=>$departmentValues,
            'backgroundColor'=>$departmentBackgroundColor
        ]);
    }
}
