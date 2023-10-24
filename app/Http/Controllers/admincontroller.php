<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function store(AdminLoginRequest $request)

    {

        if($request->authenticate()){
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::ADMIN);

        }else{

            return redirect() -> back() -> withErrors([ 'name' =>(trans('Dashboard/login_trans.Fail')) ]);

        }

    }

    public function destroy(Request $request)
    {

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');


    }
}
