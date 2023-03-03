<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthGoogle extends Controller
{
    public function index() {
        return view('auth.index');
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack() {
        $user = Socialite::driver('google')->user();

        var_dump($user);
    }
}
