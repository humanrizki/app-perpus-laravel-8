<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_books', function (Blueprint $table) {
            $table->id('id_detail_book');
            $table->string('title');
            $table->string('local_publisher');
            $table->string('original_publisher');
            $table->string('creator');
            $table->string('illustrator');
            $table->integer('pages');
            $table->date('edition');
            $table->foreignId('id_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_books');
    }
}
