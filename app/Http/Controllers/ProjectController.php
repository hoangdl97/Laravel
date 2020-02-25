<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Customer;
use App\Models\Member;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::search($request)
            ->paginate(config('app.pagination'));
        return view('projects.index', ['projects' => $projects]);
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
            'project_statuses' => ProjectStatus::all(),
            'customers' => Customer::all(),
            'members' => Member::all()
        ];
        return view('projects.create', $data);
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
        Project::create($data);
        $id = DB::getPdo()->lastInsertId();
        $result = $request->member_id;
        foreach ($result as $test) {
            $test1[] = DB::table('member_project')->insert(array(
            'member_id' => $request->member_id,
            'project_id' => $id,
        ));
        }
        return redirect()->route('project.index')->with('success', __('Add successfully'));
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
        return view('projects.edit')->with('project', Project::findOrFail($id));
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
        $result = Project::findOrFail($id);
        $result->delete();
        return redirect()->route('project.index')->with('success', __('Delete successfully'));
        //
    }
}
