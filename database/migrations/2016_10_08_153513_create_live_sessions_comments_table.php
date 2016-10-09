<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveSessionsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_sessions_comments', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');

            $table->text('comment');
            $table->integer('comment_type');

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
        Schema::dropIfExists('live_sessions_comments');
    }
}
