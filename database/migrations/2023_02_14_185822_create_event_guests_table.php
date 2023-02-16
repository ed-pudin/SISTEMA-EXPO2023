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
        Schema::create('event_guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest'); //Not nullable
            $table->foreign('guest')->references('id')->on('guests');
            $table->unsignedBigInteger('event'); //Not nullable
            $table->foreign('event')->references('id')->on('events');
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
        Schema::table('event_guests', function(Blueprint $table)
        {
            $table->dropForeign('guest');
            $table->dropForeign('event');
        });
        Schema::dropIfExists('event_guests');
    }
};
