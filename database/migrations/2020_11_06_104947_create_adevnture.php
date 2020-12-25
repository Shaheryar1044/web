<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdevnture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adventures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_id');
            $table->bigInteger('template_id');
            $table->bigInteger('edition_id');
            $table->integer('no_of_challenges');
            $table->tinyInteger('count_down')->comment('1 = yes , 0 no');
            $table->integer('countdown_duration')->nullable();
            $table->tinyInteger('challenge_notes')->comment('1 = yes , 0 no');
            $table->tinyInteger('attendees')->comment('1 = users , 0 group');
            $table->integer('no_of_groups')->nullable();
            $table->integer('users_per_group')->nullable();
            $table->tinyInteger('direct_sale')->comment('1 = yes , 0 no');
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
        Schema::dropIfExists('adventures');
    }
}
