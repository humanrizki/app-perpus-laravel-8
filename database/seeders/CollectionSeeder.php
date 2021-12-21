<?php

namespace Database\Seeders;

use App\Models\CollectionBook;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CollectionBook::create([
            'name'=>'That time I Got Reincarnated as a Slime',
            'slug'=>'that-time-i-got-reincarnated-as-a-slime'
        ]);
        CollectionBook::create([
            'name'=>'Overlord',
            'slug'=>'overlord'
        ]);
        CollectionBook::create([
            'name'=>'Mushoku Tensei: Jobless Reincarnation',
            'slug'=>'mushoku-tensei-jobless-reincarnation'
        ]);
        CollectionBook::create([
            'name'=>'The Misfit of Demon King Academy',
            'slug'=>'the-misfit-of-demon-king-academy'
        ]);
    }
}
