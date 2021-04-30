<?php

declare(strict_types=1);
namespace App\Http\Controllers\Web;

use App\Dtos\User\RegisterDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\UseCases\User\RegisterUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function view() : View
    {
        $countrys = Country::orderBy('name', 'ASC')->get();

        return view('web.register', compact('countrys'));
    }

    public function loadData() : JsonResponse|null
    {
        if(request()->get('load') == 'state')
        {
            return response()->json(
                State::where('id_country', request()->get('country'))->orderBy('name','ASC')->get()
            );
        }

        if(request()->get('load') == 'city')
        {
            return response()->json(
                City::where('id_state', request()->get('state'))->orderBy('name','ASC')->get()
            );
        }
        
        return null;
    }

    public function register(UserRegisterRequest $request) : JsonResponse
    {
        $dto = RegisterDto::fromRequest($request);

        $useCase = new RegisterUseCase();

        return $useCase->execute($dto);
    }
}
