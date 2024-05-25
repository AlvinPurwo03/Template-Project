<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Buku;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penulis = new Penulis();
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->jenis_kelamin = $request->jenis_kelamin;
        $penulis->save();
        return redirect()->route('penulis.index')
        ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.show', compact('penulis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
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
        $penulis = Penulis::findOrFail($id);
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->jenis_kelamin = $request->jenis_kelamin;

        $penulis->save();
        return redirect()->route('penulis.index')
        ->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        return redirect()->route('penulis.index')
        ->with('success', 'Data Berhasil Dihapus');
    }
}
