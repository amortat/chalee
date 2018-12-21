<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->integer('user_id')->unsigned();
            $table->string('name',45)->unique();
            $table->integer('level');
            $table->integer('playersNo');
            $table->integer('missionsNo');
            $table->string('city');
            $table->string('region');
            $table->double('cost');
            $table->double('prize');
            $table->timestamps();
        });

        Schema::create('game_mission', function (Blueprint $table) {
            $table->integer('game_id')->unsigned()->index();
            $table->integer('mission_id')->unsigned()->index();
            $table->integer('mission_step_n')->unsigned();
            $table->timestamps();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['game_id','mission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_mission');
        Schema::dropIfExists('games');
    }
}
