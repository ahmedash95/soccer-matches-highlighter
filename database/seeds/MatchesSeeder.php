<?php

use App\Match;
use App\Team;
use Illuminate\Database\Seeder;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = Team::all();
        $teamsId = collect($team)->map(function ($team) {
            return $team->id;
        })->toArray();
        $teams = array_chunk($teamsId, count($teamsId) / 2);
        $groupA = $teams[0];
        $groupB = $teams[1];
        foreach (range(1, 10) as $i) {
            Match::create([
                'title'      => 'Normal Match',
                'home_team'  => $groupA[$i],
                'guest_team' => $groupB[$i],
                'start_at'   => (new Carbon\Carbon())->addDays(rand(1, 30))->addHours(rand(2, 24))->addSeconds(rand(30, 50)),
            ]);
        }
    }
}
