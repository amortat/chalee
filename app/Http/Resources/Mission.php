<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Mission extends JsonResource
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
            'slug' => $this->slug,
            'name' => $this->name,
            'level' => $this->level,
            'userId' => $this->user_id,
            'script' => $this->job,
            'key' => $this->key,
            'photoPath' => $this->photo_path,
            'stepNo' => $this->whenPivotLoaded('game_mission', function(){
                return $this->pivot->mission_step_n;
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
