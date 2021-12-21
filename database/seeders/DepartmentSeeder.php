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
            'department'=>'Rekayasa Perangkat Lunak 1'
        ]);
        Department::create([
            'department'=>'Rekayasa Perangkat Lunak 2'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 1'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 2'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 3'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 4'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 5'
        ]);
        Department::create([
            'department'=>'Multi Media 1'
        ]);
        Department::create([
            'department'=>'Multi Media 2'
        ]);
        Department::create([
            'department'=>'Multi Media 3'
        ]);
        Department::create([
            'department'=>'Multi Media 4'
        ]);
        Department::create([
            'department'=>'Multi Media 5'
        ]);
        Department::create([
            'department'=>'Multi Media 6'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 1'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 2'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 3'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 4'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 5'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 1'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 2'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 3'
        ]);
    }
}
