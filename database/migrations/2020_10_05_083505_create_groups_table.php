<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('group_id');
            $table->unsignedTinyInteger('group_number');
            $table->unsignedTinyInteger('course');
            $table->unsignedInteger('faculty_id')->nullable();
            $table->timestamps();

            $table->foreign('faculty_id')
                ->references('faculty_id')
                ->on('faculties')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
