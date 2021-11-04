<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * @param RegisterRequest $request
     * @return \View
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        logger($data);
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return view('auth.login');
    }
}