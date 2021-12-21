<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
            'name'=>'admin ganteng',
            'username'=>'admin',
            'email'=>'humanrizki999@gmail.com',
            'password'=>Hash::make('admin'),
            'position'=>'staff',
            'rule_admin_id'=>1,
            'gender'=>'male',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
        Admin::create([
            'name'=>'deku',
            'username'=>'deku',
            'email'=>'deku@gmail.com',
            'password'=>Hash::make('admin2'),
            'position'=>'teacher',
            'rule_admin_id'=>2,
            'gender'=>'male',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
        Admin::create([
            'name'=>'Junaedi',
            'username'=>'junaedi',
            'email'=>'junaedi@gmail.com',
            'password'=>Hash::make('admin3'),
            'position'=>'staff',
            'rule_admin_id'=>3,
            'gender'=>'male',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
    }
}
