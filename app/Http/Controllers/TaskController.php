<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\MembersTasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
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
    public function create(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string',
            'task_description' => 'required|string',
            'task_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'members.*'=>'integer|exists:users,id',
        ]);

        $task = Task::create([
            'task_name' => $request->task_name,
            'task_creator_id' => auth()->user()->id,
            'task_description' => $request->task_description,
            'task_date' => $request->task_date,
            'priority' => $request->priority,
        ]);

        MembersTasks::create([
            'user_id' => auth()->user()->id,
            'task_id' => $task->id,
        ]);

        return redirect()->back()->with('message', $request->task_date);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
