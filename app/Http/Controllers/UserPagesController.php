<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        return view('UserPages.index',['userData'=>$userData,'todos'=>$todos]);
    }

    public function generateKMeans()
    {
        $userData = Auth::user();
        $data = DB::table('todo')->select('todo_deadline_weight','todo_level_weight')->where('user_id','=',$userData->user_id)->get()->toArray();
        
        $dataToTrain = array();

        foreach($data as $d)
        {
            array_push($dataToTrain,[$d->todo_deadline_weight,$d->todo_level_weight]);
        }

        $kmeans = new KMeans(2);
        $clusters = $kmeans->cluster($dataToTrain);

        $cluster1 = $clusters[0];
        $cluster2 = $clusters[1];

        foreach ($cluster1 as $clust) {
            DB::select("CALL set_todo_cluster(".$userData->user_id.",".$clust[0].",".$clust[1].",".'1'.")");
        }

        foreach ($cluster2 as $clust) {
            DB::select("CALL set_todo_cluster(".$userData->user_id.",".$clust[0].",".$clust[1].",".'2'.")");
        }

        return redirect('/');
    }
}
