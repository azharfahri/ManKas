<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dana;

class DanaController extends Controller
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
        $dana = dana::all();
        return view('dana.index', compact('dana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dana.create');
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
            'nama_dana' => 'required',
            'saldo' => 'required',
        ]);
        $dana = new dana();
        $dana->nama_dana = $request->nama_dana ;
        $dana->saldo = $request->saldo ;
        $dana->save();

        return redirect()->route('dana.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dana =dana::FindOrFail($id);
        return view('dana.show', compact('dana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dana =dana::FindOrFail($id);
        return view('dana.edit', compact('dana'));
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
            'nama_dana' => 'required',
            'saldo' => 'required',
        ]);
        $dana = dana::findOrFail($id);
        $dana->nama_dana = $request->nama_dana ;
        $dana->saldo = $request->saldo ;
        $dana->save();

        return redirect()->route('dana.index')->with('success','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dana = dana::findOrFail($id);
        $dana->delete();
        return redirect()->route('dana.index')->with('success','Data Berhasil Dihapus');
    }
}
