<?php

namespace App\Http\Controllers\Web;

use App\Dtos\User\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\UseCases\User\UpdateUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->wantsJson()){
            $size = request()->get('size') ?? '2';
            return new UserCollection(User::orderBy('name', 'ASC')->paginate($size));
        }
        return view('web.user.index')
        ->with('users', User::orderBy('name', 'ASC')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user) : JsonResponse
    {
        $dto = UpdateDto::fromRequest($request);
        $useCase = new UpdateUseCase(User::where('email', $request->email)->first());

        return $useCase->execute($dto);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
