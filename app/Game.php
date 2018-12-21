<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function getRouteKeyName()
    {
        return 'name';
    }

    protected $fillable = ['name', 'level', 'missions','playersNo', 'city', 'region'];



    public function challenges()
    {
        return $this->hasMany('App\Challenge');
    }

    public function missions()
    {
        return $this->belongsToMany('App\Mission')->withPivot('mission_step_n');
    }

    public static function isDuplicate($name)
    {
        $exist = self::where('name','=', $name)->count();
        return $exist ? false : true;
    }
}
