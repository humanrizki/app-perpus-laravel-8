<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Department::create([
            'department'=>'Rekayasa Perangkat Lunak 1',
            'backgroundColor'=>'rgb(255, 247, 0)'
        ]);
        Department::create([
            'department'=>'Rekayasa Perangkat Lunak 2',
            'backgroundColor'=>'rgb(217, 211, 43)'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 1',
            'backgroundColor'=>'rgb(43, 241, 255)'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 2',
            'backgroundColor'=>'rgb(39, 186, 196)'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 3',
            'backgroundColor'=>'rgb(28, 174, 184)'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 4',
            'backgroundColor'=>'rgb(14, 149, 158)'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 5',
            'backgroundColor'=>'rgb(88, 223, 232)'
        ]);
        Department::create([
            'department'=>'Multi Media 1',
            'backgroundColor'=>'rgb(255, 15, 23)'
        ]);
        Department::create([
            'department'=>'Multi Media 2',
            'backgroundColor'=>'rgb(252, 38, 45)'
        ]);
        Department::create([
            'department'=>'Multi Media 3',
            'backgroundColor'=>'rgb(201, 14, 20)'
        ]);
        Department::create([
            'department'=>'Multi Media 4',
            'backgroundColor'=>'rgb(189, 64, 68)'
        ]);
        Department::create([
            'department'=>'Multi Media 5',
            'backgroundColor'=>'rgb(145, 32, 36)'
        ]);
        Department::create([
            'department'=>'Multi Media 6',
            'backgroundColor'=>'rgb(196, 18, 24)'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 1',
            'backgroundColor'=>'rgb(217, 215, 208)'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 2',
            'backgroundColor'=>'rgb(99, 197, 189)'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 3',
            'backgroundColor'=>'rgb(173, 171, 161)'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 4',
            'backgroundColor'=>'rgb(179, 178, 177)'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 5',
            'backgroundColor'=>'rgb(150, 146, 141)'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 1',
            'backgroundColor'=>'rgb(255, 234, 163)'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 2',
            'backgroundColor'=>'rgb(255, 229, 140)'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 3',
            'backgroundColor'=>'rgb(235, 211, 129)'
        ]);
    }
}
