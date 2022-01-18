<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

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

        
        $admin = Admin::create([
            'name'=>'admin ganteng',
            'username'=>'admin',
            'email'=>'humanrizki999@gmail.com',
            'password'=>Hash::make('admin'),
            'position_id'=>1,
            'gender'=>'male',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
        $homeRoom = Admin::create([
            'name'=>'deku',
            'username'=>'deku',
            'email'=>'deku@gmail.com',
            'password'=>Hash::make('admin2'),
            'position_id'=>2,
            'gender'=>'male',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
        $headTeacher = Admin::create([
            'name'=>'Junaedi',
            'username'=>'junaedi',
            'email'=>'junaedi@gmail.com',
            'password'=>Hash::make('admin3'),
            'position_id'=>1,
            'gender'=>'male',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
        $admin->assignRole('admin');
        $homeRoom->assignRole('homeroom');
        $headTeacher->assignRole('headteacher');
    }
}
