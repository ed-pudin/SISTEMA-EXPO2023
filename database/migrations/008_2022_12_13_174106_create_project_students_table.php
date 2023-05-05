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
        Schema::create('project_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project'); //Not nullable
            $table->foreign('project')->references('id')->on('projects');
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
        Schema::table('project_students', function(Blueprint $table)
        {
            $table->dropForeign('project');
            $table->dropForeign('student');
        });
        Schema::dropIfExists('project_students');
    }
};
