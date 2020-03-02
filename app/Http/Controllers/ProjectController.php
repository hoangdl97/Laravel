<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Customer;
use App\Models\Member;
use App\Http\Requests\RegisterProjectRequest;

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
        $project = Project::create($data);
        $members = $request->member_id;
        foreach ((array) $members as $member) {
            $project->members()->attach($member);
        }

        return redirect()->route('project.index')->with('success', __('Add successfully'));
        //
    }
    
    public function show($id){
        $result = Project::findOrFail($id)->load('members');
         return response()->json([
             'result' => $result
         ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'project' => Project::findOrFail($id),
            'customers' => Customer::all(),
            'members' => Member::all(),
            'statuses' => ProjectStatus::all(),
        ];
        return view('projects.edit', $data)->with ('project', Project::findOrFail($id));
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
        $project = Project::findOrFail($id);
        $project->update($request->all());
        $members[] = $request->member_id;
        if ($members != '') {
            foreach ((array) $members as $member) {
                $project->members()->sync($member);
            }
        }
        return redirect()->route('project.index')->with('success', __('Edit successfully'));
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
