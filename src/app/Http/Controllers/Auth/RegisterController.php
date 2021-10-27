<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class RegisterController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registerForm()
    {
        return view('auth.register');
    }

    /**
     * @param Request $request
     */
    public function register(Request $request)
    {
        logger($request->all());
    }
}