<?php

namespace App\Dtos\User;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\User\UserRegisterRequest;

class RegisterDto extends DataTransferObject
{
    public $email;
    public $password;
    public $name;
    public $phone;
    public $card;
    public $birth_date;
    public $city;

    public static function fromRequest(UserRegisterRequest $request)
    {
        return new self($request->all());
    }
}