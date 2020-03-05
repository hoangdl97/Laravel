<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectStatus;
use App\Http\Requests\RegisterProjectStatusRequest;
use App\Http\Requests\EditProjectStatusRequest;

class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectstatuses = ProjectStatus::search($request)
            ->paginate(config('app.pagination'));
        return view('projectstatuses.index', ['project_statuses' => $projectstatuses]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projectstatuses.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterProjectStatusRequest $request)
    {
        $data = $request->all();
        ProjectStatus::create($data);

        return redirect()->route('projectstatus.index')->with('success', __('Add successfully'));
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
        return view('projectstatuses.edit')->with('projectstatus', ProjectStatus::findOrFail($id));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectStatusRequest $request, $id)
    {
        $data = $request->all();
        ProjectStatus::findOrFail($id)->update($data);
        
        return redirect()->route('projectstatus.index')->with('success', __('Edit successfully'));
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
        $result = ProjectStatus::findOrFail($id);
        $result->delete();
        return redirect()->route('projectstatus.index')->with('success', __('Delete successfully'));
        //
    }
}
