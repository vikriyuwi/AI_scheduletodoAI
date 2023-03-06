<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Models\TodoProgress;

class UserPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userData = Auth::user();
        $todos = Todo::where('user_id','=',$userData->user_id)->get();
        $progress = TodoProgress::having('user_id','=',$userData->user_id)->get();

        $todoprogress = $todos->merge($progress);

        return view('UserPages.index',['userData'=>$userData,'todos'=>$todos,'progress'=>$progress]);
    }
}
