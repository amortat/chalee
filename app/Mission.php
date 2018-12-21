<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = ['level', 'job', 'key',];

    public function games()
    {
        return $this->belongsToMa('App\Game')->withPivot('mission_step_n')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
