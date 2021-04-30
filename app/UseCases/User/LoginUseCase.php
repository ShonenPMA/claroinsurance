<?php

namespace App\UseCases\User;

use App\Dtos\User\LoginDto;
use Illuminate\Support\Facades\Auth;

class LoginUseCase
{
    public function execute(LoginDto $userLoginDto)
    {
        if (Auth::attempt(['email' => $userLoginDto->email,'password' => $userLoginDto->password])) {
            return response()->json([
                'message' => 'Bienvenido(a) ' . Auth::user()->name,
                'redirect' => route('home'),
            ], 200);
        }

        return response()->json([
            'message' => 'Error con el email y/o clave',
        ], 500);
    }
}
