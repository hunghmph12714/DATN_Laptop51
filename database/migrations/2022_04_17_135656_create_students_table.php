<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sv')->nullable();
            $table->string('ho_ten')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->text('que_quan')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->string('email')->nullable();
            $table->string('ma_lop')->nullable();
            $table->string('anh')->nullable();
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
        Schema::dropIfExists('students');
    }
}