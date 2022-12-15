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
        Schema::create('external_people_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('externalPeople'); //Not nullable
            $table->foreign('externalPeople')->references('id')->on('external_People');
            $table->unsignedBigInteger('event'); //Not nullable
            $table->foreign('event')->references('id')->on('events');
            $table->boolean('attended')->defaut(0);
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
            $table->dropForeign('externalPeople');
            $table->dropForeign('event');
        });
        Schema::dropIfExists('external_people_events');
    }
};
