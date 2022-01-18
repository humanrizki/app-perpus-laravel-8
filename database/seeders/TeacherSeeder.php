<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\DetailClassDepartment;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $totalClassDepartment = count(DetailClassDepartment::all());
        for($i = 1; $i <= $totalClassDepartment; $i++){
            $faker = Factory::create('id_ID');
            $gender = $faker->randomElement(['Male','Female']);
            $admin = Admin::create([
                'name'=>$faker->name,
                'username'=>strtolower($faker->firstName),
                'email'=>strtolower($faker->userName()).'@gmail.com',
                'password'=>Hash::make('password'),
                'position_id'=>2,
                'gender'=>$gender,
                'phone'=>$faker->phoneNumber,
                'detail_class_department_id'=>$i,
                'address'=>'Jl. belom diaspal'
            ]);
            $admin->assignRole('homeroom');
        }
    }
}
