<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChallenges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('challenge_name');
            $table->string('challenge_type');
            $table->text('text_above_challenge');
            $table->tinyInteger('hints')->comment('0 = no 1 = yes');
            $table->string('hint1')->nullable();
            $table->string('hint2')->nullable();
            $table->string('hint3')->nullable();
            $table->string('hint1_text')->nullable();
            $table->string('hint2_text')->nullable();
            $table->string('hint3_text')->nullable();
            $table->string('lock_type');
            $table->string('final_code');
            
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
        Schema::dropIfExists('challenges');
    }
}
