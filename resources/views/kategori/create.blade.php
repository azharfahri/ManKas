@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <d class="card">
                <div class="card-header">Data Kategori</div>
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
                <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" placeholder="Masukan Kategori" name="nama_kategori" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" placeholder="Masukan deskripsi (opsional)" name="deskripsi" class="form-control" >
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
