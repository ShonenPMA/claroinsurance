<?php

declare(strict_types=1);
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function view() : View
    {
        return view('web.register');
    }
}
