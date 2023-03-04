<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthGoogle extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','redirectToGoogle','googleCallBack']]);
    }

    public function index() {
        return view('auth.index');
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

        // $userGoogleId = $user->id;
        // $userGoogleEmail = $user->email;
        // $userGoogleName = $user->name;
        // $userGooglePicture = $user->picture;
        // $userGoogleToken = $user->token;

        // $userData = User::where('user_google_id','=',$userGoogleId)->first();

        // if($userData) {

        //     $credentials = [
        //         'user_name' => $userData->user_name,
        //         'user_gmail' => $userData->user_gmail,
        //         'user_google_id' => $userData->user_google_id,
        //         'password' => $userData->password,
        //         'user_token' => $userData->user_token,
        //     ];

        //     Auth::login($userData);
        //     return redirect()->intended();
            
        // } else {
        //     $newUser = [
        //         'user_name' => $userGoogleName,
        //         'user_gmail' => $userGoogleEmail,
        //         'user_google_id' => $userGoogleId,
        //         'password' => bcrypt('12345678'),
        //         'user_token' => $userGoogleToken
        //     ];

        //     User::create($newUser);

        //     $newUserData = User::where('user_google_id','=',$userGoogleId)->first();

        //     $credentials = [
        //         'user_name' => $newUserData->user_name,
        //         'user_gmail' => $newUserData->user_gmail,
        //         'user_google_id' => $newUserData->user_google_id,
        //         'password' => $newUserData->password,
        //         'user_token' => $newUserData->user_token,
        //     ];

        //     Auth::login($newUserData);
        //     return redirect()->intended();
        // }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended();
    }
}
