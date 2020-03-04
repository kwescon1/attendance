<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('qr_code_id');

            $table->foreign('qr_code_id')
                  ->references('id')
                  ->on('qr_codes');

            $table->unsignedBigInteger('student_id');


            $table->foreign('student_id')
                  ->references('id')
                  ->on('students');

            $table->boolean('recorded');      
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
        Schema::dropIfExists('records');
    }
}
