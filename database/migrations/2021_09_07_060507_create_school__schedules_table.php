<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school__schedules', function (Blueprint $table) {
            $table->id();
            $table->string('kelas');
            $table->string('hari');
            $table->string('jam_1')->nullable();
            $table->string('jam_2');
            $table->string('jam_3');
            $table->string('jam_4');
            $table->string('jam_5');
            $table->string('jam_6');
            $table->string('jam_7');
            $table->string('jam_8')->nullable();
            $table->string('istirahat');
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
        Schema::dropIfExists('school__schedules');
    }
}
