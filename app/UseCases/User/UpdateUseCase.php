<?php
declare(strict_types=1);
namespace App\UseCases\User;

use App\Dtos\User\UpdateDto;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UpdateUseCase
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute(UpdateDto $dto) : JsonResponse
    {
        $this->user->name = $dto->name;
        $this->user->phone =  $dto->phone;

        $this->user->save();

        return response()->json([
            'message' => 'Usuario actualizado con éxito'
        ]);
    }
}