<?php

declare(strict_types=1);
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function view() : View
    {
        $countrys = Country::orderBy('name', 'ASC')->get();

        return view('web.register', compact('countrys'));
    }
}
