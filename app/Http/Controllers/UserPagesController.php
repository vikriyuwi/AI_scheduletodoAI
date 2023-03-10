<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use Carbon\Carbon;

class UserPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userData = Auth::user();
        
        $cluster1 = Todo::where('user_id','=',$userData->user_id)->where('todo_status','!=','DONE')->where('todo_cluster','=','1')->where('todo_deadline','>=',Carbon::now())->orderBy('todo_weight','DESC')->orderBy('todo_deadline','ASC')->get();
        $cluster2 = Todo::where('user_id','=',$userData->user_id)->where('todo_status','!=','DONE')->where('todo_cluster','=','2')->where('todo_deadline','>=',Carbon::now())->orderBy('todo_weight','DESC')->orderBy('todo_deadline','ASC')->get();
        $donetodos = Todo::where('user_id','=',$userData->user_id)->where('todo_status','=','DONE')->orderBy('todo_weight','DESC')->orderBy('todo_deadline','ASC')->get();
        $notdonetodos = Todo::where('user_id','=',$userData->user_id)->where('todo_status','!=','DONE')->where('todo_deadline','<=',Carbon::now())->orderBy('todo_weight','DESC')->orderBy('todo_deadline','ASC')->get();

        $prioritytodos = $cluster1;
        $nonprioritytodos = $cluster2;

        if ($prioritytodos->count() == 0) {
            $prioritytodos = $cluster2;
            $nonprioritytodos = $cluster1;
        } else if($nonprioritytodos->count() > 0 && $prioritytodos[0]->todo_deadline > $nonprioritytodos[0]->todo_deadline) {
            $prioritytodos = $cluster2;
            $nonprioritytodos = $cluster1;
        }

        return view('TodoManagement.index',['userData'=>$userData,'prioritytodos'=>$prioritytodos,'nonprioritytodos'=>$nonprioritytodos,'donetodos'=>$donetodos,'notdonetodos'=>$notdonetodos,'currentDate'=>Carbon::now()]);
    }

    public function generateKMeans()
    {
        TodoManagementController::KMeans();

        return redirect('/')->with('message',session('message'))->with('messageType',session('messageType'));
    }
}
