<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['title','home_team','guest_team','start_at'];
    protected $appends = ['end_at'];

    public function homeTeam(){
    	return $this->belongsTo(Team::class,'home_team','id');
    }
    public function guestTeam(){
    	return $this->belongsTo(Team::class,'guest_team','id');
    }
    public function getStartAtAttribute($date){
        return new \Carbon\Carbon($date);
    }
    public function liveSessions(){
        return $this->hasMany(LiveSessionsComments::class);
    }
    public function getEndAtAttribute(){
        return $this->start_at->addMinutes(100);
    }
}
