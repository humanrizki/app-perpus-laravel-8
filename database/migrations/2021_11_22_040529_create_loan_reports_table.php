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
            $table->date('loan_date')->nullable();
            $table->date('return_date')->nullable();
            $table->integer('forfeit');
            $table->string('slug');
            $table->enum('status',['request','paid','borrow'])->default('request');
            $table->foreignId('bucket_id');
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
