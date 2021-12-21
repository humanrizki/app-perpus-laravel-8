<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Book;
use App\Models\Bookcase;
use App\Models\Category;
use App\Models\ClassUser;
use App\Models\CollectionBook;
use App\Models\Department;
use App\Models\DetailBook;
use App\Models\User;
use App\Models\RulesUser;
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
        Department::create([
            'department'=>'Rekayasa Perangkat Lunak 1'
        ]);
        Department::create([
            'department'=>'Rekayasa Perangkat Lunak 2'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 1'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 2'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 3'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 4'
        ]);
        Department::create([
            'department'=>'Teknik Komputer & Jaringan 5'
        ]);
        Department::create([
            'department'=>'Multi Media 1'
        ]);
        Department::create([
            'department'=>'Multi Media 2'
        ]);
        Department::create([
            'department'=>'Multi Media 3'
        ]);
        Department::create([
            'department'=>'Multi Media 4'
        ]);
        Department::create([
            'department'=>'Multi Media 5'
        ]);
        Department::create([
            'department'=>'Multi Media 6'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 1'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 2'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 3'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 4'
        ]);
        Department::create([
            'department'=>'Otomatisasi & Tata Kelola Perkantoran 5'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 1'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 2'
        ]);
        Department::create([
            'department'=>'Bisnis Daring & Pemasaran 3'
        ]);
        ClassUser::create([
            'class'=>'10'
        ]);
        ClassUser::create([
            'class'=>'11'
        ]);
        ClassUser::create([
            'class'=>'12'
        ]);
        Admin::create([
            'name'=>'admin ganteng',
            'username'=>'admin',
            'email'=>'humanrizki999@gmail.com',
            'password'=>Hash::make('admin'),
            'position'=>'staff',
            'phone'=>'085691009232',
            'address'=>'Jl. belom diaspal'
        ]);
        RulesUser::create([
            'rule'=>'siswa'
        ]);
        RulesUser::create([
            'rule'=>'admin'
        ]);
        RulesUser::create([
            'rule'=>'guru'
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
        CollectionBook::create([
            'name'=>'Overlord',
            'slug'=>'overlord'
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
            'collection_book_id'=>1,
            'bookcase_id'=>1,
            'admin_id'=>1
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
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        DetailBook::create([
            'title'=>'Overlord Volume 1',
            'image'=>'overlord1.png',
            'slug'=>'overlord-volume-1',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Yen Press',
            'creator'=>'Kugane Murayama',
            'illustrator'=>'so-bin',
            'pages'=>256,
            'edition'=> \Carbon\Carbon::createFromDate(2016,3,24)->toDateTimeString(),
            'category_id'=>1,
            'collection_book_id'=>2,
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        DetailBook::create([
            'title'=>'Overlord Volume 2',
            'image'=>'overlord2.png',
            'slug'=>'overlord-volume-2',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Yen Press',
            'creator'=>'Kugane Murayama',
            'illustrator'=>'so-bin',
            'pages'=>256,
            'edition'=> \Carbon\Carbon::createFromDate(2016,9,27)->toDateTimeString(),
            'category_id'=>1,
            'collection_book_id'=>2,
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        DetailBook::create([
            'title'=>'Overlord Volume 3',
            'image'=>'overlord3.png',
            'slug'=>'overlord-volume-3',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Yen Press',
            'creator'=>'Kugane Murayama',
            'illustrator'=>'so-bin',
            'pages'=>288,
            'edition'=> \Carbon\Carbon::createFromDate(2017,1,31)->toDateTimeString(),
            'category_id'=>1,
            'collection_book_id'=>2,
            'bookcase_id'=>1,
            'admin_id'=>1
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
        // Book::create([
        //     'bookcase_id'=>1,
        //     'detail_book_id'=>3
        // ]);
        Book::create([
            'bookcase_id'=>1,
            'detail_book_id'=>3
        ]);
        Book::create([
            'bookcase_id'=>1,
            'detail_book_id'=>4
        ]);
        Book::create([
            'bookcase_id'=>1,
            'detail_book_id'=>5
        ]);
    }
}
