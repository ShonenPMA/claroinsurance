<?php
declare(strict_types=1);

namespace App\UseCases\Email;

use App\Dtos\Email\RegisterDto;
use App\Models\Email;
use App\Models\User;
use Mews\Purifier\Facades\Purifier;
class RegisterUseCase
{
    private $user;
    private $email;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->email = new Email();
    }

    public function execute(RegisterDto $dto)
    {
        $this->email->receiver = $dto->receiver;
        $this->email->subject = $dto->subject;
        $this->email->message = Purifier::clean($dto->content);
        $this->email->user_id = $this->user->id;
        $this->email->save();

        return response()->json([
            'message' => 'Email registrado',
            'data' => $this->email,
            'redirect' => route('emails.index')
        ]);
    }
}