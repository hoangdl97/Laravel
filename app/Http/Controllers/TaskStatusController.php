<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskStatus;
use App\Http\Requests\RegisterTaskStatusRequest;
use App\Http\Requests\EditTaskStatusRequest;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $taskstatuses = TaskStatus::search($request)
            ->paginate(config('app.pagination'));
        return view('taskstatuses.index', ['task_statuses' => $taskstatuses]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taskstatuses.create');
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
        $data = $request->all();
        TaskStatus::create($data);

        return redirect()->route('taskstatus.index')->with('success', __('Add successfully'));
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
        return view('taskstatuses.edit')->with('taskstatus', TaskStatus::findOrFail($id));
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
        $data = $request->all();
        TaskStatus::findOrFail($id)->update($data);
        
        return redirect()->route('taskstatus.index')->with('success', __('Edit successfully'));
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
        $result = TaskStatus::findOrFail($id);
        $result->delete();
        return redirect()->route('taskstatus.index')->with('success', __('Delete successfully'));
        //
    }
}
