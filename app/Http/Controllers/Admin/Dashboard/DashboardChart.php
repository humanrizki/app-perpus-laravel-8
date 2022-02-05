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
        return view('admin.chart.index',[
            'title'=>'Page chart'
        ]);
    }
    public function students(){
        
        // dd($departmentNames);
        return view('admin.chart.students',[
            'title'=>'Page chart'
        ]);
    }
    public function loans(){
        return view('admin.chart.loans',[
            'title'=>'Page chart'
        ]);
    }
    public function transactions(){
        return view('admin.chart.transactions',[
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
