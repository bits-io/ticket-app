<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Concert::all();
        return view('app.admin.concert.index', $data);
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
        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('images/concert'), $imageName);
        $imagePath = 'images/concert/' . $imageName;

        $request->validate([
            'name' => 'required',
            'start_time'=> 'required',
            'place'=>'required',
            'quota'=>'required',
            'price'=>'required'
        ]);

        Concert::create([
            'name'=>$request->name,
            'start_time'=> $request->start_time,
            'image'=>$imagePath,
            'place'=>$request->place,
            'quota'=>$request->quota,
            'price'=>$request->price
        ]);
        return redirect('admin/concert');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Concert::FindOrFail($id);
        return view('app.admin.concert.detail', $data);
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
        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('images/concert'), $imageName);
        $imagePath = 'images/concert/' . $imageName;

        $request->validate([
            'name' => 'required',
            'start_time'=> 'required',
            'place'=>'required',
            'quota'=>'required',
            'price'=>'required'
        ]);

        Concert::find($id)->update([
            'name'=>$request->name,
            'start_time'=> $request->start_time,
            'image'=>$imagePath,
            'place'=>$request->place,
            'quota'=>$request->quota,
            'price'=>$request->price
        ]);
        return redirect('admin/concert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Concert::destroy($id);
        return redirect('admin/concert');
    }
}
