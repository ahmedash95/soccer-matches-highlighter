<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Auth::login(\App\User::first());
        foreach (range('A', 'Z') as $char) {
        	Team::create(['name' => 'TEAM '.$char]);
		}
    }
}
