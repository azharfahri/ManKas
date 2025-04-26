@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <d class="card">
                <div class="card-header">Data transaksi</div>
                <div class="card-body">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('transaksi.show', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label">ID User</label>
                    <select class="form-control" name="id_user" disabled>
                        @foreach($user as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_user ? 'selected' : '' }} >{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">ID Kategori</label>
                    <select class="form-control" name="id_kategori" disabled>
                        @foreach($kategori as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $transaksi->id_kategori ? 'selected' : '' }} >{{ $data->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tipe Transaksi</label>
                    <select class="form-control" name="tipe_transaksi" disabled>
                        <option value="">{{ $transaksi->tipe_transaksi }}</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="text" placeholder="Masukan Jumlah" value="{{ $transaksi->jumlah }}" name="jumlah" class="form-control" disabled >
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tanggal Transaksi</label>
                    <input type="date" placeholder="Masukan Tanggal" value="{{ $transaksi->tanggal_transaksi }}" name="tanggal_transaksi" disabled class="form-control" >
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" placeholder="Masukan Deskripsi" value="{{ $transaksi->deskripsi }}" name="deskripsi" disabled class="form-control" >
                </div>
                
                <a href="{{ route('transaksi.index') }}" class="btn btn-danger">Kembali</a>
                
            </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
