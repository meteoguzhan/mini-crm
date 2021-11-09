<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginCTRL extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request, AuthLoginRequest $authLoginRequest): RedirectResponse
    {
        $authLoginRequest->validated();

        $is_login = Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        if (!$is_login) {
            return redirect()->route('auth.login')
                ->withErrors(['msg' => 'Email or password is incorrect']);
        }

        return redirect()->route('home.index');
    }
}
