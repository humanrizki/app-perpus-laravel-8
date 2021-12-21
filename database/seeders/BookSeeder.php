<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Book::create([
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
            'stock'=>10,
            'collection_book_id'=>1,
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        Book::create([
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
            'stock'=>10,
            'collection_book_id'=>1,
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        Book::create([
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
            'stock'=>5,
            'collection_book_id'=>2,
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        Book::create([
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
            'stock'=>5,
            'collection_book_id'=>2,
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        Book::create([
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
            'stock'=>5,
            'collection_book_id'=>2,
            'bookcase_id'=>1,
            'admin_id'=>1
        ]);
        Book::create([
            'title'=>'Mushoku Tensei: Jobless Reincarnation Volume 1',
            'image'=>'mushokutensei1.jpg',
            'slug'=>'mushoku-tensei-jobless-reincarnation-volume-1',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Media Factory',
            'creator'=>'Rifujin na Magonote',
            'illustrator'=>'Shirotaka',
            'pages'=>312,
            'edition'=> \Carbon\Carbon::createFromDate(2014,1,23)->toDateTimeString(),
            'category_id'=>1,
            'stock'=>7,
            'collection_book_id'=>3,
            'bookcase_id'=>2,
            'admin_id'=>1
        ]);
        Book::create([
            'title'=>'Mushoku Tensei: Jobless Reincarnation Volume 2',
            'image'=>'mushokutensei2.jpg',
            'slug'=>'mushoku-tensei-jobless-reincarnation-volume-2',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Media Factory',
            'creator'=>'Rifujin na Magonote',
            'illustrator'=>'Shirotaka',
            'pages'=>320,
            'edition'=> \Carbon\Carbon::createFromDate(2014,3,22)->toDateTimeString(),
            'category_id'=>1,
            'stock'=>7,
            'collection_book_id'=>3,
            'bookcase_id'=>2,
            'admin_id'=>1
        ]);
        Book::create([
            'title'=>'Mushoku Tensei: Jobless Reincarnation Volume 3',
            'image'=>'mushokutensei3.jpg',
            'slug'=>'mushoku-tensei-jobless-reincarnation-volume-3',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'Media Factory',
            'creator'=>'Rifujin na Magonote',
            'illustrator'=>'Shirotaka',
            'pages'=>323,
            'edition'=> \Carbon\Carbon::createFromDate(2014,5,22)->toDateTimeString(),
            'category_id'=>1,
            'stock'=>7,
            'collection_book_id'=>3,
            'bookcase_id'=>2,
            'admin_id'=>1
        ]);
        Book::create([
            'title'=>'The Misfit of Demon King Academy Volume 1',
            'image'=>'anos1.jpg',
            'slug'=>'the-misfit-of-demon-king-academy-volume-1',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'ASCII Media Works',
            'creator'=>'Shu',
            'illustrator'=>'Shizuma Yosinori',
            'pages'=>320,
            'edition'=> \Carbon\Carbon::createFromDate(2018,3,10)->toDateTimeString(),
            'category_id'=>1,
            'stock'=>7,
            'collection_book_id'=>4,
            'bookcase_id'=>2,
            'admin_id'=>1
        ]);
        Book::create([
            'title'=>'The Misfit of Demon King Academy Volume 2',
            'image'=>'anos2.jpg',
            'slug'=>'the-misfit-of-demon-king-academy-volume-2',
            'local_publisher'=>'Elex Media Komputindo',
            'original_publisher'=>'ASCII Media Works',
            'creator'=>'Shu',
            'illustrator'=>'Shizuma Yosinori',
            'pages'=>376,
            'edition'=> \Carbon\Carbon::createFromDate(2018,6,10)->toDateTimeString(),
            'category_id'=>1,
            'stock'=>7,
            'collection_book_id'=>4,
            'bookcase_id'=>2,
            'admin_id'=>1
        ]);
    }
}
