<?php

declare(strict_types=1);
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmailCollection;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\View\View;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View|ResourceCollection
    {
        if(request()->wantsJson()){
            $size = request()->get('size') ?? '2';
            return new EmailCollection(Email::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate($size));
        }
        return view('web.email.index')
        ->with('emails', Email::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('web.email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}
