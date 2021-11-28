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
            $table->id();
            $table->timestamp('returned_date')->useCurrent(true);
            $table->integer('forfeit');
            $table->foreignId('book_id');
            $table->foreignId('admin_id');
            $table->foreignId('member_id');
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
