<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
