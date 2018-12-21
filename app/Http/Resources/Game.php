<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'userId' => $this->user_id,
            'level' => $this->level,
            'playersNo' => $this->playersNo,
            'missionsNo '=>$this->missionsNo,
            'city' => $this->city,
            'region' => $this->region,
            'cost' => $this->cost,
            'prize' => $this->prize,
            'missions'=>$this->missions,
            'challenges'=>$this->challenges,
/*            'missions' => Mission::collection($this->missions),*/
/*            'challenges' => Challenge::collection($this->challenges),*/
        ];
    }
}
