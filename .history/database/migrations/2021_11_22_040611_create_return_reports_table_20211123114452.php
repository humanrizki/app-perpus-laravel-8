<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_reports', function (Blueprint $table) {
            $table->id('id_return');
            $table->timestamp('return_date');
            $table->integer('forfeit');
            $table->foreignId('id_book');
            $table->foreignId('id_admin');
            $table->foreignId('id_member');
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
        Schema::dropIfExists('return_reports');
    }
}
