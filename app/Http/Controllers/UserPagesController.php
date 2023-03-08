<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Models\TodoProgress;
use App\Models\TodoValue;
use Phpml\Clustering\KMeans;

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

    public function kMeans()
    {
        
        $data = [[2,1],[3,2],[1,3],[4,7]];
        $kmeans = new KMeans(2);
        $clusters = $kmeans->cluster($data);

        return view('tes',['data'=>$data]);
    }
}
