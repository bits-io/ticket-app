<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\BandPlaying;
use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BandPlayingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = DB::table('band_playing')
                        ->join('concerts', 'band_playing.concert_id', '=', 'concerts.id')
                        ->join('bands', 'band_playing.band_id', '=', 'bands.id')
                        ->select('band_playing.*', 'concerts.name AS concert_name', 'bands.name AS band_name')
                        ->get();
        $data['concerts'] = Concert::all();
        $data['bands'] = Band::all();
        return view('app.admin.band-playing.index', $data);
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
            'band_id' => 'required',
            'concert_id' => 'required',
        ]);
        BandPlaying::create([
            'band_id'=>$request->band_id,
            'concert_id'=>$request->concert_id,
        ]);
        return redirect('admin/band-playing');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = BandPlaying::FindOrFail($id);
        $data['concerts'] = Concert::all();
        $data['bands'] = Band::all();
        return view('app.admin.band-playing.detail', $data);
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
        BandPlaying::find($id)->update([
            'band_id'=>$request->band_id,
            'concert_id'=>$request->concert_id,
        ]);
        return redirect('admin/band-playing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BandPlaying::destroy($id);
        return redirect('admin/band-playing');
    }
}
