<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id('DepartmentID');
            $table->unsignedBigInteger('CollegeID');
            $table->string('DepartmentName');
            $table->string('DepartmentCode');
            $table->boolean('IsActive')->default(1);
            $table->timestamps();

            $table->foreign('CollegeID')->references('CollegeID')->on('colleges')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
