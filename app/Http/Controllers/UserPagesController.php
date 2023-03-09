<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use App\Models\TodoProgress;
use App\Models\TodoValue;
use Phpml\Clustering\KMeans;
use Phpml\Clustering\KMeans\Cluster;

class UserPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userData = Auth::user();
        
        $data = Todo::where('user_id','=',$userData->user_id)->get()->count();

        if ($data > 1) {
            DB::select("CALL set_todo_weight_all()");
        }
        
        $cluster1 = Todo::where('user_id','=',$userData->user_id)->where('todo_cluster','=','1')->orderBy('todo_weight','DESC')->orderBy('todo_deadline','ASC')->get();
        $cluster2 = Todo::where('user_id','=',$userData->user_id)->where('todo_cluster','=','2')->orderBy('todo_weight','DESC')->orderBy('todo_deadline','ASC')->get();

        $prioritytodos = $cluster1;
        $nonprioritytodos = $cluster2;

        if($nonprioritytodos->count() > 0 && $prioritytodos[0]->todo_deadline > $nonprioritytodos[0]->todo_deadline) {
            $prioritytodos = $cluster2;
            $nonprioritytodos = $cluster1;
        }

        return view('TodoManagement.index',['userData'=>$userData,'prioritytodos'=>$prioritytodos,'nonprioritytodos'=>$nonprioritytodos]);
    }

    public function KMeans()
    {
        $userData = Auth::user();
        $data = DB::table('todo')->select('todo_deadline_weight','todo_level_weight')->where('user_id','=',$userData->user_id)->where('todo_status','!=','DONE')->get()->toArray();

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

        return 0;
    }

    public function generateKMeans()
    {
        $userData = Auth::user();
        // get todo not done
        $data = DB::table('todo')->select('todo_deadline_weight','todo_level_weight')->where('user_id','=',$userData->user_id)->where('todo_status','!=','DONE')->get()->toArray();

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

        return redirect('/')->with('message',session('message'))->with('messageType',session('messageType'));
    }
}
