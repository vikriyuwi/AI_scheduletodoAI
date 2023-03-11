<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Step;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SystemController;
use Carbon\Carbon;

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

        SystemController::refreshCluster();

        return redirect('/')->with('message','Todo '.$request->todoName.' has been added')->with('messageType','success');
    }

    public function updateStepStatus(Request $request)
    {
        $data = DB::select("CALL set_step_status(".$request->step_id.",'".$request->step_status."')");

        SystemController::refreshCluster();

        return redirect('todo/'.$request->todo_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::find($id);
        $steps = Step::where('todo_id','=',$id)->get();
        return view('TodoManagement.details', ['todo'=>$todo,'steps'=>$steps,'currentDate'=>Carbon::now()->addDays(1)]);
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
        $todo = Todo::find($id);

        $validation = $request->validate([
            'todoName' => 'required',
            'todoDeadline' => 'required',
            'todoDifficulty' => 'required|not_in:0'
        ]);

        $todo->todo_name = $request->todoName;
        $todo->todo_deadline = $request->todoDeadline;
        $todo->todo_difficulty_level = $request->todoDifficulty;
        $todo->todo_note = $request->todoNote;

        if($request->todoLink != null) {
            $validation2 = $request->validate([
                'todoLink' => 'url',
            ]);
            $todo->todo_link = $request->todoLink;
        }

        SystemController::refreshCluster();

        $todo->save();

        return redirect('todo/'.$id)->with('message','Todo '.$todo->todo_name.' has been update')->with('messageType','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        Todo::destroy($id);

        SystemController::refreshCluster();

        return redirect('/')->with('message','Todo '.$todo->todo_name.' has been removed')->with('messageType','success');
    }
}
