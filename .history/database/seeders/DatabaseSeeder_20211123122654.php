<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\DetailBook;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::create([
            'name'=>'admin ganteng',
            'username'=>'admin',
            'email'=>'humanrizki999@gmail.com',
            'password'=>Hash::make('admin'),
            'position'=>'staff',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
        Member::create([
            'name'=>'MUHAMMAD RIZKI',
            'username'=>'humanrizki',
            'email'=>'humanrizki123@gmail.com',
            'password'=>'humanrizki123',
            'code_member'=>'1910441',
            'gender'=>'Male',
            'phone'=>'085691009232',
            'department'=>'RPL',
        ]);
        Category::create([
            'name'=>'Novel'
        ]);
        Category::create([
            'name'=>'Series'
        ]);
        Category::create([
            'name'=>'Subject'
        ]);
        DetailBook::create([
            'title'=>'That time I Got Reincarnated as a Slime Volume 1',
            'image'=>'tenshura1.png',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Shōsetsuka ni Narō',
            'creator'=>'Fuze',
            'illustrator'=>'Mitz Vah',
            'pages'=>292,
            'edition'=> \Carbon\Carbon::createFromDate(2017,12,19)->toDateTimeString(),
            'id_category'=>1
        ]);
    }
}
