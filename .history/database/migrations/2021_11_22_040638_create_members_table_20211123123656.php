<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('id_member');
            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('code_member');
            $table->enum('gender',['Male','Female']);
            $table->char('phone',15);
            $table->string('department');
            $table->unique('code_member','code_member_unique');
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
        Schema::dropIfExists('members');
    }
}
