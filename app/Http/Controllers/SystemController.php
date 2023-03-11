<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Phpml\Clustering\KMeans;
use Carbon\Carbon;

class SystemController extends Controller
{
    public static function refreshCluster()
    {
        DB::select("CALL set_todo_weight_all(".Auth::user()->user_id.")");
        SystemController::KMeans();
    }

    public static function KMeans()
    {
        $userData = Auth::user();
        $data = DB::table('todo')->select('todo_deadline_weight','todo_level_weight')->where('user_id','=',$userData->user_id)->where('todo_status','!=','DONE')->where('todo_deadline','>=',Carbon::now())->get()->toArray();

        if(sizeof($data) < 1) {
            return 0;
        }

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
            if (sizeof($data) == 1) {
                $clust[0] = 0;
            }
            DB::select("CALL set_todo_cluster(".$userData->user_id.",".$clust[0].",".$clust[1].",".'1'.")");
        }

        foreach ($cluster2 as $clust) {
            DB::select("CALL set_todo_cluster(".$userData->user_id.",".$clust[0].",".$clust[1].",".'2'.")");
        }

        return 0;
    }
}
