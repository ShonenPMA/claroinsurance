<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'name' => $this->name,
            'card' => $this->card,
            'email' => $this->email,
            'phone' => $this->phone,
            'age' => $this->age,
            'delete' => '<a class="delete p-2 bg-red-600 text-white" href="'.route('users.destroy', $this).'">ELIMINAR</a>'
        ];
    }
}
