<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Customer::all();
        $data['user'] = User::all();
        return view('app.admin.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([
            'user_id' => 'required',
            'nik' => 'required',
            'full_name' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Customer::create([
            'user_id' => $request->user_id,
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect('admin/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Customer::FindOrFail($id);
        $data['user'] = User::all();
        return view('app.admin.customer.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $request->validate([
            'user_id' => 'required',
            'nik' => 'required',
            'full_name' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Customer::find($id)->update([
            'user_id' => $request->user_id,
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect('admin/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('admin/customer');
    }
}
