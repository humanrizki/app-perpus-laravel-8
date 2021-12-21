<?php

namespace Database\Seeders;

use App\Models\Bookcase;
use Illuminate\Database\Seeder;

class BookCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bookcase::create([
            'name'=>'case001',
            'location_bookcase'=>'1'
        ]);
        Bookcase::create([
            'name'=>'case002',
            'location_bookcase'=>'2'
        ]);
        Bookcase::create([
            'name'=>'case003',
            'location_bookcase'=>'3'
        ]);
    }
}
