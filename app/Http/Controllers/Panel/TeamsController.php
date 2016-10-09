<?php

namespace App\Http\Controllers\Panel;

use App\Team;
use Illuminate\Http\Request;

class TeamsController extends PanelController
{
    public function index()
    {
        $teams = Team::all();

        return view($this->panelViewPath.'teams.index', compact('teams'));
    }

    public function create()
    {
        return view($this->panelViewPath.'teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:teams']);
        Team::create(['name' => $request->input('name')]);
        //@todo Alert
        return redirect()->route('teams.index');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return view($this->panelViewPath.'teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required|unique:teams,name,'.$id]);
        Team::findOrFail($id)
            ->update(['name' => $request->input('name')]);
        //@todo Alert
        return redirect()->route('teams.index');
    }

    public function destroy($id)
    {
        Team::findOrFail($id)->delete();
        //@todo Alert
        return redirect()->route('teams.index');
    }
}
