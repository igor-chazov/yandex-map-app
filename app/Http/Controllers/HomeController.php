<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirectUser()
    {
        if (Auth::check()) {
            return redirect(url('/geos/show'));;
        } else {
            return view('welcome');
        }
    }
}
