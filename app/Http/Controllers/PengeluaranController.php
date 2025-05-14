<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dana;
use App\Models\pengeluaran;
use Illuminate\Support\Facades\Auth;

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
        $dana = dana::where('id_user', Auth::id())->get();
        $pengeluaran = pengeluaran::where('id_user', Auth::id())->get();
        return view('pengeluaran.index', compact('dana','pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dana = dana::where('id_user', Auth::id())->get();
        $pengeluaran = pengeluaran::where('id_user', Auth::id())->get();
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
            'tanggal' => 'required'
        ]);
        $pengeluaran = new pengeluaran();
        $pengeluaran->deskripsi= $request->deskripsi ;
        $pengeluaran->jumlah = $request->jumlah ;
        $pengeluaran->id_dana = $request->id_dana ;
        $pengeluaran->tanggal = $request->tanggal ;
        $pengeluaran->id_user = Auth::id();
        $pengeluaran->created_at = now();
        $pengeluaran->save();

        $dana = Dana::findOrFail($request->id_dana);
        $dana->saldo -= $request->jumlah;
        $dana->save();

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
        $dana = dana::where('id_user', Auth::id())->get();
        $pengeluaran = pengeluaran::where('id_user', Auth::id())->get();

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
        $dana = dana::where('id_user', Auth::id())->get();
        $pengeluaran = pengeluaran::where('id_user', Auth::id())->get();

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
            'tanggal' => 'required'
        ]);
        $pengeluaran =pengeluaran::where('id',$id)->where('id_user', Auth::id())->firstorfail();
        $pengeluaran->deskripsi= $request->deskripsi ;
        $pengeluaran->jumlah = $request->jumlah ;
        $pengeluaran->id_dana = $request->id_dana ;
        $pengeluaran->tanggal = $request->tanggal ;
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
        $dana = dana::where('id_user', Auth::id())->get();
        $pengeluaran = pengeluaran::where('id_user', Auth::id())->get();
        return redirect()->route('pengeluaran.index')->with('success','Data Berhasil Dihapus');
    }
}
