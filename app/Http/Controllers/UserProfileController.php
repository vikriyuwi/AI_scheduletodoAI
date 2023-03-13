<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        $userData = Auth::user();

        return view('UserPages.profile',['userData'=>$userData]);
    }

    public function update(Request $request, string $id)
    {
        $data = User::find($id);

        if(($request->user_phone == null || $request->user_phone == substr($data->user_phone,2)) && ($request->user_pronounce == "0" || $request->user_pronounce == null))
        {
            return redirect('/profile')->with('message','There is nothing to change')->with('messageType','warning');
        } else {
            $request->validate([
                'user_phone' => 'max:64',
                'user_pronounce' => 'max:64|in:1,2,3',
            ]);
    
            if ($request->user_phone != null || $request->user_phone == "") {
                if(substr($request->user_phone,0,2) == '08') {
                    $data->user_phone = "62".substr($request->user_phone,2);
                } else {
                    $data->user_phone = "62".$request->user_phone;
                }
            }

            if ($request->user_pronounce != null || $request->user_pronounce == '0') {
                switch ($request->user_pronounce) {
                    case '1':
                        $data->user_pronounce = "He/Him";
                        break;
                    case '2':
                        $data->user_pronounce = "She/Her";
                        break;
                    case '3':
                        $data->user_pronounce = "They/Them";
                        break;
                    default:
                        break;
                }
            }
    
            $data->save();

            return redirect('/profile')->with('message','Profile updated')->with('messageType','success');
        }
    }
}
