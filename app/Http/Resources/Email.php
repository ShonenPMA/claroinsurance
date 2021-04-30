<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        Carbon::setLocale('es');
        return [
            'receiver' => $this->receiver,
            'created_at' =>Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('j F Y H:i'),
            'state' => $this->state
        ];
    }
}
