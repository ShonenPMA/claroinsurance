<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiEmailCollection;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $size = request()->get('size') ?? '2';

        return new ApiEmailCollection(
            Email::orderBy('created_at', 'DESC')
                    ->receiver(request()->get('receiver'))
                    ->subject(request()->get('subject'))
                    ->sender(request()->get('sender'))
                    ->paginate($size));
    }
}
