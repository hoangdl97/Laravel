<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\Member;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::search($request)
            ->paginate(config('app.pagination'));
        return view('tasks.index', ['tasks' => $tasks]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'task_statuses' => TaskStatus::all(),
            'projects' => Project::all(),
            'members' => Member::all()
        ];
        return view('tasks.create', $data);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('task.index')->with('success', __('Add successfully'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $task = Task::findOrFail($id);
            $data = [
                'task' => Task::findOrFail($id),
                'projects' => Project::all(),
                'statuses' => TaskStatus::all(),
                'members' => Member::all()
            ];
            return view('tasks.edit', $data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Task::findOrFail($id);
        $result->delete();
        return redirect()->route('task.index')->with('success', __('Delete successfully'));
        //
    }
}
