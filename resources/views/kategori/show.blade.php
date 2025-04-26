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
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" placeholder="" value="{{ $kategori->nama_kategori }}" name="nama_kategori" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" placeholder="" value="{{ $kategori->deskripsi }}" name="deskripsi" class="form-control" disabled>
                </div>
                
                <a href="{{ route('kategori.index') }}" class="btn btn-danger">Back</a>
                
            </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
