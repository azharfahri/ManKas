<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dana;
use App\Models\pemasukan;
use Illuminate\Support\Facades\Auth;


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
        $dana = dana::where('id_user', Auth::id())->get();
        $pemasukan = pemasukan::where('id_user', Auth::id())->get();
        return view('pemasukan.index', compact('dana','pemasukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dana = dana::where('id_user', Auth::id())->get();
        $pemasukan = pemasukan::where('id_user', Auth::id())->get();
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
        'tanggal' => 'required'
    ]);


    $pemasukan = new Pemasukan();
    $pemasukan->deskripsi = $request->deskripsi;
    $pemasukan->jumlah = $request->jumlah;
    $pemasukan->id_dana = $request->id_dana;
    $pemasukan->tanggal = $request->tanggal;
    $pemasukan->id_user = Auth::id();
    $pemasukan->created_at = now();
    $pemasukan->save();


    $dana = Dana::findOrFail($request->id_dana);
    $dana->saldo += $request->jumlah;
    $dana->save();

    return redirect()->route('pemasukan.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $pemasukan =pemasukan::where('id',$id)->where('id_user', Auth::id())->firstorfail();

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
        $dana = dana::where('id_user', Auth::id())->get();
        $pemasukan =pemasukan::where('id',$id)->where('id_user', Auth::id())->firstorfail();

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
            'jumlah' => 'required|numeric',
            'id_dana' => 'required',
            'tanggal' => 'required'
        ]);

        $pemasukan = pemasukan::where('id', $id)->where('id_user', Auth::id())->firstOrFail();


        if ($pemasukan->id_dana != $request->id_dana) {
            // Ambil dana lama & kurangi saldo
            $danaLama = Dana::findOrFail($pemasukan->id_dana);
            $danaLama->saldo -= $pemasukan->jumlah;
            $danaLama->save();

            // Ambil dana baru & tambahkan saldonya
            $danaBaru = Dana::findOrFail($request->id_dana);
            $danaBaru->saldo += $request->jumlah;
            $danaBaru->save();
        } else {
            // id_dana sama, cukup hitung selisih saldo
            $dana = Dana::findOrFail($pemasukan->id_dana);
            $selisih = $request->jumlah - $pemasukan->jumlah;
            $dana->saldo += $selisih;
            $dana->save();
        }

        // Update data pemasukan
        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->jumlah = $request->jumlah;
        $pemasukan->id_dana = $request->id_dana;
        $pemasukan->tanggal = $request->tanggal;
        $pemasukan->save();

        return redirect()->route('pemasukan.index')->with('success', 'Data Berhasil Diubah');
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
        $pemasukan =pemasukan::where('id',$id)->where('id_user', Auth::id())->firstorfail();
        $pemasukan->delete();
        return redirect()->route('pemasukan.index')->with('success','Data Berhasil Dihapus');
    }
}
