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
                <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">ID User</label>
                        <select class="form-control" name="id_user" >
                            @foreach($user as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">ID Kategori</label>
                        <select class="form-control" name="id_kategori" >
                            @foreach($kategori as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tipe Transaksi</label>
                        <select class="form-control" name="tipe_transaksi" >
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="text" placeholder="Masukan Jumlah" name="jumlah" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" placeholder="Masukan Tanggal" name="tanggal_transaksi" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" placeholder="Masukan Deskripsi" name="deskripsi" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
