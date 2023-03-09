<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Step;
use App\Models\TodoProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Phpml\Clustering\KMeans;
use Phpml\Clustering\KMeans\Cluster;

class TodoManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DB::select("CALL set_todo_weight_all()");
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('TodoManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataTodo = [
            'todo_name' => $request->todoName,
            'todo_note' => $request->todoNote,
            'user_id' => Auth::user()->user_id,
            'todo_difficulty_level' => $request->todoDifficulty,
            'todo_link' => $request->todoLink,
            'todo_deadline' => $request->todoDeadline,
        ];

        $currentTodo = Todo::create($dataTodo);

        $todoSteps = $request->todoSteps;

        $stepName = $request->input('stepName');
        $stepDesc = $request->input('stepDesc');

        foreach ($stepName as $key => $value) {
            $dataStep = [
                'step_name' => $stepName[$key],
                'todo_id' => $currentTodo->todo_id,
                'step_detail' => $stepDesc[$key],
                'step_isdone' => 0
            ];
            Step::create($dataStep);
        }

        if(Todo::where('user_id','=',Auth::user()->user_id)->where('todo_status','!=','DONE')->get()->count() > 1) {
            DB::select("CALL set_todo_weight_all()");
        }

        return redirect('/generateKMeans')->with('message','Todo '.$request->todoName.' has been added')->with('messageType','success');
    }

    public function updateStepStatus(Request $request)
    {
        DB::select("CALL update_step_status(".$request->step_id.",'".$request->step_status."')");
        DB::select("CALL set_todo_done(".$request->todo_id.")");
        $this->KMeans();
        return redirect('todo/'.$request->todo_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::where('todo_id','=',$id)->first();
        $steps = Step::where('todo_id','=',$id)->get();
        return view('TodoManagement.details', ['todo'=>$todo, 'steps'=>$steps]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        Todo::destroy($id);
        
        $userData = Auth::user();
        
        $data = Todo::where('user_id','=',$userData->user_id)->get()->count();

        if ($data > 1) {
            DB::select("CALL set_todo_weight_all()");
        }

        return redirect('/generateKMeans')->with('message','Todo '.$todo->todo_name.' has been removed')->with('messageType','success');
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
}
