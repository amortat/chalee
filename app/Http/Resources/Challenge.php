<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Challenge extends JsonResource
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
            'gameId' => $this->game_id,
            'userId' => $this->user_id,
            'status' => $this->status,
            'startedAt' => $this->startedAt,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'game' => $this->game,
            'users' =>$this->users,
            'players' => $this->users_count
        ];
    }
}
