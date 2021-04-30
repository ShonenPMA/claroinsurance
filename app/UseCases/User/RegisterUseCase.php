<?php
declare(strict_types=1);
namespace App\UseCases\User;

use App\Dtos\User\RegisterDto;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterUseCase
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function execute(RegisterDto $dto) : JsonResponse
    {
        $this->user->name = $dto->name;
        $this->user->email = $dto->email;
        $this->user->password =  bcrypt($dto->password);
        $this->user->name =  $dto->name;
        $this->user->phone =  $dto->phone;
        $this->user->card =  $dto->card;
        $this->user->birth_date =  $dto->birth_date;
        $this->user->id_city =  $dto->city;

        $this->user->save();

        return response()->json([
            'message' => 'Usuario registrado',
            'data' => $this->user,
            'redirect' => route('login')
        ]);
    }
}