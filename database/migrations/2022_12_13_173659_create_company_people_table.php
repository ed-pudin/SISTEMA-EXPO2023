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
        Schema::create('company_people', function (Blueprint $table) {
            $table->id();
            $table->string('fullName', 100); //Not null
            $table->unsignedBigInteger('company'); //Not nullable
            $table->foreign('company')->references('id')->on('companies');
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
        Schema::table('company_people', function(Blueprint $table)
        {
            $table->dropForeign('company');
        });

        Schema::dropIfExists('company_people');
    }
};
