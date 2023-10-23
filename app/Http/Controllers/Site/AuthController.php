<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;

class AuthController extends Controller {
    public function register(Request $request)
    {
        return view("site.auth.register");
    }

    public function postRegister(UserStoreRequest $request)
    {
        $newUser = User::create($request->all());

        if ($newUser) {
            return redirect("/")->with("success", "Your account has been created successfully!");
        }

        return back()->with('error', 'Contact the administration.');
    }

    public function login(Request $request)
    {
        return view("site.auth.login");
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
