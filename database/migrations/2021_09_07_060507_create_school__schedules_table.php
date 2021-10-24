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
            $table->foreign('jam_1')->references('mapel_id')->on('subjects');
            $table->foreign('jam_2')->references('mapel_id')->on('subjects');
            $table->foreign('jam_3')->references('mapel_id')->on('subjects');
            $table->foreign('jam_4')->references('mapel_id')->on('subjects');
            $table->foreign('jam_5')->references('mapel_id')->on('subjects');
            $table->foreign('jam_6')->references('mapel_id')->on('subjects');
            $table->foreign('jam_7')->references('mapel_id')->on('subjects');
            $table->foreign('jam_8')->references('mapel_id')->on('subjects');
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
