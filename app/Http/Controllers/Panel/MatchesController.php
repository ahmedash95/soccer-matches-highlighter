<?php

namespace App\Http\Controllers\Panel;

use App\Match;
use App\Team;
use Illuminate\Http\Request;

class MatchesController extends PanelController
{
    public function index()
    {
        $matches = Match::all();
        return view($this->panelViewPath . 'matches.index', compact('matches'));
    }

    public function create()
    {
        $teams = Team::all();
        return view($this->panelViewPath . 'matches.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:matches,title',
            'home_team'     => 'required|exists:teams,id',
            'guest_team'    => 'required|exists:teams,id',
            'start_at_date' => 'required|date',
            'start_at_time' => 'required',
        ]);
        Match::create([
            'title'      => $request->input('name'),
            'home_team'  => $request->input('home_team'),
            'guest_team' => $request->input('guest_team'),
            'start_at'   => $request->input('start_at_date') . ' ' . $request->input('start_at_time'),
        ]);
        //@todo Alert
        return redirect()->route('matches.index');
    }

    public function edit($id)
    {
        $match = Match::findOrFail($id);
        $teams = Team::all();
        return view($this->panelViewPath . 'matches.edit', compact('match', 'teams'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required|unique:matches,title,' . $id,
            'home_team'     => 'required|exists:teams,id',
            'guest_team'    => 'required|exists:teams,id',
            'start_at_date' => 'required|date',
            'start_at_time' => 'required',
        ]);
        Match::findOrFail($id)
            ->update([
                'title'      => $request->input('name'),
                'home_team'  => $request->input('home_team'),
                'guest_team' => $request->input('guest_team'),
                'start_at'   => $request->input('start_at_date') . ' ' . $request->input('start_at_time'),
            ]);
        //@todo Alert
        return redirect()->route('matches.index');
    }

    public function destroy($id)
    {
        Match::findOrFail($id)->delete();
        //@todo Alert
        return redirect()->route('matches.index');
    }
}
