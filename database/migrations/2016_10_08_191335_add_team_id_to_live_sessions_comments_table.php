<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamIdToLiveSessionsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('live_sessions_comments', function (Blueprint $table) {
            $table->integer('team_id')->unsigned()->after('match_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('live_sessions_comments', function (Blueprint $table) {
            //
        });
    }
}
