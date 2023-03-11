<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;
use App\Http\Controllers\SystemController;

class StepManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'todoId' => 'required|exists:todo,todo_id',
            'stepName' => 'required'
        ]);

        $data = [
            'todo_id' => $request->todoId,
            'step_name' => $request->stepName,
            'step_detail' => $request->stepDetail,
            'step_status' => 'TODO'
        ];

        $step = Step::create($data);

        SystemController::refreshCluster();

        return redirect('todo/'.$step->todo_id)->with('message','Step '.$step->step_name.' has been added')->with('messageType','success');;;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('/');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $step = Step::find($id);

        $steps = Step::where('todo_id','=',$step->todo_id)->get()->count();

        if ($steps < 2) {
            return redirect('todo/'.$step->todo_id)->with('message','Cannot delete '.$step->step_name.', you only have 1 step in this todo')->with('messageType','danger');
        }

        Step::destroy($id);

        SystemController::refreshCluster();

        return redirect('todo/'.$step->todo_id)->with('message','Step '.$step->step_name.' has been deleted')->with('messageType','success');
    }
}
