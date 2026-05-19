<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
        //
        
        }
        
    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'commentaire' => 'required|string',
            'task_id' => 'required|integer|exists:tasks,id',
        ]);

        Comments::create([
            'contenu' => $request->commentaire,
            'user_id' => auth()->user()->id,
            'task_id' => $request->task_id,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }

    /**
     * Get comments for a specific task.
     */
    public function getComments($task_id)
    {
        $comments = Comments::where('task_id', $task_id)
            ->with('getUser')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($comments);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentsRequest $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
