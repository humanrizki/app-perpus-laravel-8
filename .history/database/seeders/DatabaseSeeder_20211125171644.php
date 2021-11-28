<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Book;
use App\Models\Bookcase;
use App\Models\Category;
use App\Models\CollectionBook;
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
        CollectionBook::create([
            'name'=>'That time I Got Reincarnated as a Slime',
            'slug'=>'that-time-i-got-reincarnated-as-a-slime'
        ]);
        DetailBook::create([
            'title'=>'That time I Got Reincarnated as a Slime Volume 1',
            'image'=>'tenshura1.jpg',
            'slug'=>'that-time-i-got-reincarnated-as-a-slime-volume-1',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Shōsetsuka ni Narō',
            'creator'=>'Fuze',
            'illustrator'=>'Mitz Vah',
            'pages'=>292,
            'edition'=> \Carbon\Carbon::createFromDate(2017,12,19)->toDateTimeString(),
            'category_id'=>1,
            'collection_book_id'=>1
        ]);
        DetailBook::create([
            'title'=>'That time I Got Reincarnated as a Slime Volume 2',
            'image'=>'tenshura2.jpg',
            'slug'=>'that-time-i-got-reincarnated-as-a-slime-volume-2',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Shōsetsuka ni Narō',
            'creator'=>'Fuze',
            'illustrator'=>'Mitz Vah',
            'pages'=>273,
            'edition'=> \Carbon\Carbon::createFromDate(2018,10,25)->toDateTimeString(),
            'category_id'=>1,
            'collection_book_id'=>1,
            'bookcase_id'=>1
        ]);
        DetailBook::create([
            'title'=>'That time I Got Reincarnated as a Slime Volume 3',
            'image'=>'tenshura3.jpg',
            'slug'=>'that-time-i-got-reincarnated-as-a-slime-volume-3',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Shōsetsuka ni Narō',
            'creator'=>'Fuze',
            'illustrator'=>'Mitz Vah',
            'pages'=>295,
            'edition'=> \Carbon\Carbon::createFromDate(2019,1,20)->toDateTimeString(),
            'category_id'=>1,
            'collection_book_id'=>1,
            'bookcase_id'=>1
        ]);
        Bookcase::create([
            'name'=>'case001',
            'location_bookcase'=>'1'
        ]);
        Book::create([
            'bookcase_id'=>1,
            'detail_book_id'=>1
        ]);
        Book::create([
            'bookcase_id'=>1,
            'detail_book_id'=>2
        ]);
        Book::create([
            'bookcase_id'=>1,
            'detail_book_id'=>3
        ]);
    }
}
