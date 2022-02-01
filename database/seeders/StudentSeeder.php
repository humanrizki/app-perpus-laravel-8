<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\DetailClassDepartment;

class StudentSeeder extends Seeder
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
            $gender = $faker->randomElement(['male','female']);
            User::create([
                'name'=>$faker->name,
                'username'=>strtolower($faker->userName()),
                'email'=>strtolower($faker->userName()).'@gmail.com',
                'password'=>Hash::make('password'),
                'nisn'=>(int)'19'.$faker->numerify('#######'),
                'gender'=>$gender,
                'phone'=>$faker->phoneNumber,
                'detail_class_department_id'=>$i,
                // 'address'=>'Jl. belom diaspal'
            ]);
            // $admin->assignRole('homeroom');
        }
    }
}
