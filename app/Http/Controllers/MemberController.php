<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\RegisterMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::Where(function($query) use ($request) 
        {
            if (!empty($request->keySearch)) {
                $query->where('name', 'like', '%' . $request->keySearch . '%')  
                ->orWhere('email', 'like', '%' . $request->keySearch . '%')
                ->orWhere('phone', 'like', '%' . $request->keySearch . '%')
                ->orWhere('id', 'like', '%' . $request->keySearch . '%');      
            }
        })->paginate(config('app.pagination'));
        return view('member.index', ['members' => $members]);

        $members = Member::paginate(config('app.pagination'));
        return view('member.index', ['members' => $members]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterMemberRequest $request)
    {
        $result = new Member();
        $result = Member::create($request->all());

        return redirect()->route('member.index');
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
        return view('member.edit')->with('members', Member::findOrFail($id));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterMemberRequest $request, $id)
    {
        $result = Member::findOrFail($id);
        $result->update($request->all());

        return redirect()->route('member.index');
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
        $result = Member::findOrFail($id);
        $result->delete();
        return redirect()->route('member.index')->with('success', __('messages.destroy'));
        //
    }
}
