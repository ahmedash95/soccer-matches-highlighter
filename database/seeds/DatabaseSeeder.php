<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function truncate(){
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	\App\User::truncate();
    	\App\Match::truncate();
    	\App\LiveSessionsComments::truncate();
    	\App\Team::truncate();
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->truncate();
        $this->call(UsersSeeder::class);
        $this->call(TeamsSeeder::class);
        $this->call(MatchesSeeder::class);
    }
}
