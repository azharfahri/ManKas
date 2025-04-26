<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\transaksi;
use App\Models\User;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::all();
        $kategori = kategori::all();
        $user = user::all();
        return view('transaksi.index', compact('transaksi','user','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $user = user::all();
        return view('transaksi.create', compact('kategori','user'));
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
            'id_user' => 'required',
            'id_kategori' => 'required',
            'tipe_transaksi' => 'required',
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required',
            'deskripsi' => 'required',
        ]);
        $transaksi = new transaksi();
        $transaksi->id_user = $request->id_user ;
        $transaksi->id_kategori = $request->id_kategori ;
        $transaksi->tipe_transaksi = $request->tipe_transaksi ;
        $transaksi->jumlah = $request->jumlah ;
        $transaksi->tanggal_transaksi = $request->tanggal_transaksi ;
        $transaksi->deskripsi = $request->deskripsi ;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi =transaksi::FindOrFail($id);
        $kategori = kategori::all();
        $user = user::all();
        return view('transaksi.show', compact('transaksi','user','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi =transaksi::FindOrFail($id);
        $kategori = kategori::all();
        $user = user::all();
        return view('transaksi.edit', compact('transaksi','kategori','user'));
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
            'id_user' => 'required',
            'id_kategori' => 'required',
            'tipe_transaksi' => 'required',
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required',
            'deskripsi' => 'required',
        ]);
        $transaksi = transaksi::findOrFail($id);
        $transaksi->id_user = $request->id_user ;
        $transaksi->id_kategori = $request->id_kategori ;
        $transaksi->tipe_transaksi = $request->tipe_transaksi ;
        $transaksi->jumlah = $request->jumlah ;
        $transaksi->tanggal_transaksi = $request->tanggal_transaksi ;
        $transaksi->deskripsi = $request->deskripsi ;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success','Data Berhasil Dihapus');
    }
}
