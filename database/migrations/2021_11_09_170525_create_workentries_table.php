<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workentries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt');
            $table->dateTime('deletedAt');
            $table->foreign('userId')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workentries');
    }
}
