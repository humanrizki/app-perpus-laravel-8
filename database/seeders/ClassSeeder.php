<?php

namespace Database\Seeders;

use App\Models\ClassUser;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ClassUser::create([
            'class'=>'10'
        ]);
        ClassUser::create([
            'class'=>'11'
        ]);
        ClassUser::create([
            'class'=>'12'
        ]);

    }
}
