<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Email extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'receiver' => $this->receiver,
            'created_at' => $this->created_at->format('j \d\e F \d\e\l Y H:i'),
            'state' => $this->state
        ];
    }
}
