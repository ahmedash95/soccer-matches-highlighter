<?php

namespace App\Http\Controllers;

use App\Match;

class MatchController extends Controller
{
    public function live($id)
    {
        $match = Match::findOrFail($id);

        return view('matches.live_session', compact('match'));
    }
}
