<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shares = Share::all();

        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'share_judul'=>'string',
            'share_penerbit'=> 'string',
            'share_tahun_terbit' => 'integer',
            'share_pengarang' => 'string'
          ]);
          $share = new Share([
            'judul' => $request->get('judul'),
            'penerbit'=> $request->get('penebit'),
            'tahun_terbit'=> $request->get('tahun_terbit'),
            'pengarang' => $request->get('pengarang')
          ]);
          $share->save();
          return redirect('/shares')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
        $share = Share::find($id);

        return view('shares.edit', compact('share'));
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
        $request->validate([
            'judul'=>'string',
            'penerbit'=> 'string',
            'tahun_terbit' => 'integer',
            'pengarang' => 'string'
          ]);
    
          $share = Share::find($id);
          $share->judul = $request->get('judul');
          $share->penerbit = $request->get('penerbit');
          $share->tahun_terbit = $request->get('tahun_terbit');
          $share->pengarang = $request->get('pengarang');
          $share->save();
    
          return redirect('/shares')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $share = Share::find($id);
        $share->delete();

        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }
}
