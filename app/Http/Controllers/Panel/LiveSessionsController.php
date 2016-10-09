<?php

namespace App\Http\Controllers\Panel;

use App\LiveSessionsComments;
use App\Match;
use Illuminate\Http\Request;

class LiveSessionsController extends PanelController
{
    public function index()
    {
        $matches = Match::all();

        return view($this->panelViewPath.'live_sessions.index', compact('matches'));
    }

    /*
     *    Start Match Live Session
     *    @int $id
     */
    public function start($id)
    {
        $match = Match::with('liveSessions')->findOrFail($id);
        $commentTypes = LiveSessionsComments::$types;

        return view($this->panelViewPath.'live_sessions.start', ['match' => $match, 'comment_types' => $commentTypes]);
    }

    public function postComment(Request $request, $id)
    {
        $match = Match::findOrFail($id);
        $comment = $match->liveSessions()->create([
            'match_id'     => $id,
            'team_id'      => $request->input('team'),
            'comment'      => $request->input('comment'),
            'comment_type' => $request->input('comment_type'),
        ]);
        event(new \App\Events\MatchLiveSession($match, $comment));

        return response()->json([
            'success' => true,
            'comment' => LiveSessionsComments::find($comment->id),
        ]);
    }
}
