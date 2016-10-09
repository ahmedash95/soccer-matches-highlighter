<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LiveSessionsComments extends Model
{
    protected $fillable = ['match_id', 'team_id', 'comment', 'comment_type'];
    protected $appends = ['type', 'comment_time'];
    protected $with = ['team'];
    public static $types = [
        0 => 'Match Start',
        1 => 'Goal',
        2 => 'Foul',
        3 => 'penalty',
        4 => 'offside',
        5 => 'yellow card',
        6 => 'red card',
        7 => 'Match End',
    ];

    public function match()
    {
        return $this->belongsTo(Match::class);
    }

    public function getTypeAttribute()
    {
        return static::$types[$this->comment_type];
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getCommentTimeAttribute()
    {
        $start = new Carbon($this->match->start_at);
        $end = new Carbon($this->created_at);

        return gmdate('i:s', $end->diffInSeconds($start));
    }
}
