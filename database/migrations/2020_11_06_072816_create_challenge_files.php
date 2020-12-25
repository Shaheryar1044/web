<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('challenge_id')->unsigned();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->string('file_path');
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
        Schema::dropIfExists('challenge_files');
    }
}
