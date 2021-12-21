<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'=>'Novel',
            'slug'=>'novel'
        ]);
        Category::create([
            'name'=>'Series',
            'slug'=>'series'
        ]);
        Category::create([
            'name'=>'Subject',
            'slug'=>'subject'
        ]);
    }
}
