<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->string('slug')->unique();
            $table->integer('game_id')->unsigned()->index();
            $table->integer('user_id')->unsigned();
            $table->string('status');
            $table->date('started_at')->nullable();
            $table->timestamps();
        });

        Schema::create('challenge_user', function (Blueprint $table) {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('user_step_n')->unsigned();
            $table->timestamps();
            $table->foreign('challenge_id')
                ->references('id')->on('challenges')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['challenge_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenge_user');
        Schema::dropIfExists('challenges');
    }
}
