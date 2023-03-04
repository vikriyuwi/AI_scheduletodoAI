<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Step;
use Illuminate\Support\Facades\Auth;

class TaskManager extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataTodo = [
            'todo_name' => $request->taskName,
            'user_id' => Auth::user()->user_id,
            'todo_difficulty_level' => $request->taskDifficulty,
            'todo_link' => $request->taskLink,
            'todo_deadline' => $request->taskDeadline,
        ];
        $currentTodo = Todo::create($dataTodo);
        $taskStep = $request->taskStep;

        for ($i = 0; $i < $taskStep; $i++) {
            $dataStep = [
                'step_name' => $request->input('taskStep'.$i),
                'todo_id' => $currentTodo->todo_id,
                'step_detail' => $request->input('taskDesc'.$i),
                'step_isdone' => 0
            ];
            Step::insert($dataStep);
        }        
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
