<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('eventName', 100);
            $table->dateTime('date');
            $table->time('startTime');
            $table->time('endTime');
            $table->unsignedBigInteger('guest'); //Not nullable
            $table->foreign('guest')->references('id')->on('guests');
            $table->string('typeEvent', 100);
            $table->string('image', 500);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_students', function(Blueprint $table)
        {
            $table->dropForeign('guest');
        });
        Schema::dropIfExists('events');
    }
};
