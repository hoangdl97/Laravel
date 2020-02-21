<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Requests\EditCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::search($request)
            ->paginate(config('app.pagination'));
        return view('customers.index', ['customers' => $customers]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterCustomerRequest $request)
    {
        $data = $request->all();
        $imageData = uniqid() . '.' . request()->image->getClientOriginalExtension();
        request()->image->storeAs('/public/uploads', $imageData);
        $data['image'] = $imageData;
        Customer::create($data);

        return redirect()->route('customer.index')->with('success', __('Add successfully'));
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
        return view('customers.edit')->with('customer', Customer::findOrFail($id));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCustomerRequest $request, $id)
    {
        $data = $request->all();
        $image = $request->file('image');
        if ($image != '') {
            $imageData = uniqid() . '.' . request()->image->getClientOriginalExtension();
            request()->image->storeAs('public/uploads', $imageData);
            $data['image'] = $imageData;
        }

        Customer::findOrFail($id)->update($data);
        return redirect()->route('customer.index')->with('success', __('Edit successfully'));
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
        $result = Customer::findOrFail($id);
        $result->delete();
        return redirect()->route('customer.index')->with('success', __('Delete successfully'));
        //
    }
}
