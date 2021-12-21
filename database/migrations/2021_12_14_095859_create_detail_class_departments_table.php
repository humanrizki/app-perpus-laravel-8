<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailClassDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_class_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_user_id')
            ->nullable()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('department_id')
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
        Schema::dropIfExists('detail_class_departments');
    }
}
