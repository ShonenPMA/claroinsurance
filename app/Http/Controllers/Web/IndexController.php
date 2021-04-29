<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function view() : View
    {
        return view('web.welcome');
    }
}
