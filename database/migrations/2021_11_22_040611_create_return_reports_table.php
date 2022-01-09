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
            $table->date('loan_date');
            $table->date('date_of_payment');
            $table->integer('cost');
            $table->integer('nominal');
            $table->integer('change');
            $table->enum('type_payment',['kas','tunai']);
            $table->enum('status',['not returned','done']);
            $table->string('slug')->unique();
            $table->foreignId('book_id');
            $table->foreignId('admin_id');
            $table->foreignId('user_id');
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
