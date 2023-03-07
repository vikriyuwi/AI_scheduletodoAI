<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Step;
use App\Models\TodoProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $todos = Todo::where('user_id','=',$userData->user_id)->get();
        $progress = TodoProgress::having('user_id','=',$userData->user_id)->get();

        return view('TodoManagement.index',['userData'=>$userData,'todos'=>$todos,'progress'=>$progress]);
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

        DB::select("CALL set_todo_value(". $currentTodo->todo_id .")");

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
