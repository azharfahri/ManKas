<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\dana;
use App\Models\user;
use App\Models\pengeluaran;
use App\Models\pemasukan;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $iduser = Auth::id();

    // Ambil data
    $dana = dana::where('id_user', $iduser)->get();
    $pemasukan = pemasukan::where('id_user', $iduser)->get();
    $pengeluaran = pengeluaran::where('id_user', $iduser)->get();

    // Buat array
    $dataDana = [];

    foreach ($dana as $dompet) {
        // Hitung
        $totalPemasukan = pemasukan::where('id_user', $iduser)
                                    ->where('id_dana', $dompet->id)
                                    ->sum('jumlah');

        $totalPengeluaran = pengeluaran::where('id_user', $iduser)
                                    ->where('id_dana', $dompet->id)
                                    ->sum('jumlah');

        $dataDana[] = [
            'nama_dana' => $dompet->nama_dana,
            'total_pemasukan' => $totalPemasukan,
            'total_pengeluaran' => $totalPengeluaran,
            'saldo' => $totalPemasukan - $totalPengeluaran,
            'tanggal' => $dompet->created_at->format('d M Y')
        ];
    }

    return view('home', compact('dataDana','pemasukan','pengeluaran'));
}




}
