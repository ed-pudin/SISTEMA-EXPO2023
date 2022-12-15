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
        Schema::create('event_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event'); //Not nullable
            $table->foreign('event')->references('id')->on('events');
            $table->unsignedBigInteger('student'); //Not nullable
            $table->foreign('student')->references('enrollment')->on('students');
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
            $table->dropForeign('event');
            $table->dropForeign('student');
        });
        Schema::dropIfExists('event_students');
    }
};
