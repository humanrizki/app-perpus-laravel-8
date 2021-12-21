<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('slug');
            $table->string('local_publisher');
            $table->string('original_publisher');
            $table->string('creator');
            $table->string('illustrator');
            $table->integer('pages');
            $table->date('edition');
            $table->integer('stock');
            $table->foreignId('category_id')
                    ->nullable()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('collection_book_id')
                    ->nullable()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('admin_id')
                    ->nullable()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('bookcase_id')
                    ->nullable()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
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
        Schema::dropIfExists('books');
    }
}
