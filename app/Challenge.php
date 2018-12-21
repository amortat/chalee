<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = ['game_id', 'status', 'started_at'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('user_step_n')->withTimestamps();
    }

    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function remindPlayers()
    {
        $challenge = $this::withCount('users')->find($this->id);
        return  (int)$challenge->game->player_n - (int)$challenge->users_count;
    }

    public function hasUser()
    {
        $challenge = $this->users()->pluck('user_id');
        $int = $challenge->intersect(\Auth::id());
        if($int->count() > 0 ){
            return false;
        }else{
            return true;
        }
    }
}
