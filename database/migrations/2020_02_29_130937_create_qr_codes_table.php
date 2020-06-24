<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->unsignedBigInteger('lecturer_id');
            $table->time('time');

            $table->foreign('lecturer_id')
                  ->references('id')
                  ->on('lecturers');

            $table->unsignedBigInteger('course_id');

            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses');

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
        Schema::dropIfExists('qr_codes');
    }
}
