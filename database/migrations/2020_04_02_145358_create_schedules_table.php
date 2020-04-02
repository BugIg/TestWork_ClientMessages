<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('message_id');
            $table->time('time', 0);
            $table->timestamps();

            $table->index('message_id');
            $table->foreign('message_id')->references('id')->on('messages');

            $table->unique(['message_id', 'time'], 'message_time_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
