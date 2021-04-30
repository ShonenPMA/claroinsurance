<?php

namespace App\Dtos\Email;

use App\Abstracts\DataTransferObject;
use App\Http\Requests\Email\EmailRegisterRequest;

class RegisterDto extends DataTransferObject
{
    public $receiver;
    public $content;
    public $subject;

    public static function fromRequest(EmailRegisterRequest $request)
    {
        return new self($request->all());
    }
}