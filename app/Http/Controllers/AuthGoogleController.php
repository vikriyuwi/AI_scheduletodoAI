<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthGoogleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','redirectToGoogle','googleCallBack']]);
    }

    public function index() {
        return view('Auth.index');
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack() {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'user_google_id' => $googleUser->id,
        ], [
            'user_name' => $googleUser->name,
            'user_gmail' => $googleUser->email,
            'user_picture' => $googleUser->avatar,
            'user_token' => $googleUser->token,
            'password' => bcrypt('12345678'),
        ]);

        Auth::login($user);
        return redirect()->intended();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended();
    }
}
