<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dana;
use App\Models\pemasukan;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pemasukan = pemasukan::all();
        $dana = dana::all();
        return view('pemasukan.index', compact('dana','pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasukan = pemasukan::all();
        $dana = dana::all();
        return view('pemasukan.create', compact('dana','pemasukan'));
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
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'id_dana' => 'required',
        ]);
        $pemasukan = new pemasukan();
        $pemasukan->deskripsi= $request->deskripsi ;
        $pemasukan->jumlah = $request->jumlah ;
        $pemasukan->id_dana = $request->id_dana ;
        $pemasukan->save();

        return redirect()->route('pemasukan.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemasukan =pemasukan::FindOrFail($id);
        $dana = dana::all();
        
        return view('pemasukan.show', compact('pemasukan','dana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemasukan =pemasukan::FindOrFail($id);
        $dana = dana::all();
        
        return view('pemasukan.edit', compact('pemasukan','dana'));
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
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'id_dana' => 'required',
        ]);
        $pemasukan =pemasukan::FindOrFail($id);
        $pemasukan->deskripsi= $request->deskripsi ;
        $pemasukan->jumlah = $request->jumlah ;
        $pemasukan->id_dana = $request->id_dana ;
        $pemasukan->save();

        return redirect()->route('pemasukan.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan = pemasukan::findOrFail($id);
        $pemasukan->delete();
        return redirect()->route('pemasukan.index')->with('success','Data Berhasil Dihapus');
    }
}
