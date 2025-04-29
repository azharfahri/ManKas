<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dana;
use App\Models\pengeluaran;

class PengeluaranController extends Controller
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
        $pengeluaran = pengeluaran::all();
        $dana = dana::all();
        return view('pengeluaran.index', compact('dana','pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengeluaran = pengeluaran::all();
        $dana = dana::all();
        return view('pengeluaran.create', compact('dana','pengeluaran'));
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
        $pengeluaran = new pengeluaran();
        $pengeluaran->deskripsi= $request->deskripsi ;
        $pengeluaran->jumlah = $request->jumlah ;
        $pengeluaran->id_dana = $request->id_dana ;
        $pengeluaran->save();

        return redirect()->route('pengeluaran.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran =pengeluaran::FindOrFail($id);
        $dana = dana::all();
        
        return view('pengeluaran.show', compact('pengeluaran','dana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran =pengeluaran::FindOrFail($id);
        $dana = dana::all();
        
        return view('pengeluaran.edit', compact('pengeluaran','dana'));
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
        $pengeluaran =pengeluaran::FindOrFail($id);
        $pengeluaran->deskripsi= $request->deskripsi ;
        $pengeluaran->jumlah = $request->jumlah ;
        $pengeluaran->id_dana = $request->id_dana ;
        $pengeluaran->save();

        return redirect()->route('pengeluaran.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = pengeluaran::findOrFail($id);
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with('success','Data Berhasil Dihapus');
    }
}
