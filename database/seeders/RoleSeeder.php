<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Role::create([
            'name'=>'superadmin',
            'guard_name'=>'admin'
        ]);
        Role::create([
            'name'=>'admin',
            'guard_name'=>'admin'
        ]);
        Role::create([
            'name'=>'homeroom',
            'guard_name'=>'admin'
        ]);
        Role::create([
            'name'=>'headteacher',
            'guard_name'=>'admin'
        ]);
    }
}
