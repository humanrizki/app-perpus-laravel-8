<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_reports', function (Blueprint $table) {
            $table->id();
            $table->timestamp('loan_date')->useCurrent(true);
            $table->timestamp('return_date')->useCurrent(true);
            $table->integer('forfeit');
            $table->foreignId('book_id');
            $table->foreignId('user_id');
            $table->foreignId('admin_id');
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
        Schema::dropIfExists('loan_reports');
    }
}
