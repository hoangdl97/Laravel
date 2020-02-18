<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\RegisterMemberRequest;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::search($request)
            ->searchPosition($request)
            ->paginate(config('app.pagination'));
        return view('member.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterMemberRequest $request)
    {
        $data = $request->all();
        $imageData = uniqid() . '.' . request()->image->getClientOriginalExtension();
        request()->image->storeAs('/public/uploads', $imageData);
        $data['image'] = $imageData;
        $data['password'] = Hash::make($data['password']);
        Member::create($data);

        return redirect()->route('member.index')->with('success', __('messages.create'));
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
        $data = $request->all();
        $imageData = uniqid() . '.' . request()->image->getClientOriginalExtension();
        request()->image->storeAs('/public/uploads', $imageData);
        $imageData = $imageData;
        $data['image'] = $imageData;
        $data['password'] = Hash::make($data['password']);

        $member = Member::findOrFail($id)->update($data);
        return redirect()->route('member.index');
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
    }
}
