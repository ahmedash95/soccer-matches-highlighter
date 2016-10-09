<?php

namespace App\Http\Controllers;

use App\Match;

class HomeController extends Controller
{
    public function index()
    {
        $data['nextMatch'] = $this->getNextMatch();
        $data['nextFiveMatches'] = $this->getNextFiveMatchs();

        return view('welcome', $data);
    }

    public function getNextFiveMatchs()
    {
        return Match::where('start_at', '>=', new \Carbon\Carbon())
                ->orderBy('created_at')
                ->skip(1)
                ->limit(5)
                ->get();
    }

    public function getNextMatch()
    {
        return Match::where('start_at', '>=', new \Carbon\Carbon())
                ->orderBy('created_at')
                ->first();
    }
}
