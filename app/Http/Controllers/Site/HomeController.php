<?php

namespace App\Http\Controllers\Site;

use Cookie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    function home()
    {
        return view('site.index');
    }
}
