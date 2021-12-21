<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name'=>'admin baru',
            'username'=>'admin1',
            'email'=>'humanrizki321@gmail.com',
            'password'=>Hash::make('admin'),
            'position'=>'staff',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
    }
}
