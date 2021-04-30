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
            'created_at' => $this->created_at,
            'state' => $this->state,
            'delete' => '<a class="delete p-2 bg-red-600 text-white" href="'.route('emails.destroy', $this).'">ELIMINAR</a>'
        ];
    }
}
