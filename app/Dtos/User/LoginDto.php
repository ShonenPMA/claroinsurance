<?php

namespace App\Dtos\User;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\User\UserLoginRequest;

class LoginDto extends DataTransferObject
{
    public $email;

    public $password;

    public static function fromRequest(UserLoginRequest $request) : self
    {
        return new self($request->all());
    }
}
