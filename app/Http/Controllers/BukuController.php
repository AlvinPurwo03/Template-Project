<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;

class BukuController extends Controller
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
        $buku = Buku::all();
        return view('buku.index', compact('buku'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = Penulis::all();
        return view('buku.create', compact('penulis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = new buku();
        $buku->nama_buku = $request->nama_buku;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori;
        $buku->tanggal_terbit = $request->tanggal_terbit;
        $buku->id_penulis = $request->id_penulis;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->cover = $name;
        }


        $buku->save();
        return redirect()->route('buku.index')
        ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $penulis = Penulis::all();
        return view('buku.edit', compact('buku', 'penulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->nama_buku = $request->nama_buku;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori;
        $buku->tanggal_terbit = $request->tanggal_terbit;
        $buku->id_penulis = $request->id_penulis;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->cover = $name;
        }


        $buku->save();
        return redirect()->route('buku.index')
        ->with('success', 'Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')
        ->with('success', 'Data Berhasil Dihapus');

    }
}
