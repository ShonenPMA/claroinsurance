<?php

namespace App\Dtos\User;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\User\UserUpdateRequest;

class UpdateDto extends DataTransferObject
{
    public $name;
    public $phone;


    public static function fromRequest(UserUpdateRequest $request)
    {
        return new self($request->all());
    }
}