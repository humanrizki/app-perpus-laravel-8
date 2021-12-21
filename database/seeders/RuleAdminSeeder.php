<?php

namespace Database\Seeders;

use App\Models\RuleAdmin;
use Illuminate\Database\Seeder;

class RuleAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RuleAdmin::create([
            'rule'=>'admin'
        ]);
        RuleAdmin::create([
            'rule'=>'homeroom'
        ]);
        RuleAdmin::create([
            'rule'=>'head teacher'
        ]);
    }
}
