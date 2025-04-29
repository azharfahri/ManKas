@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <d class="card">
                <div class="card-header">Data Dompet</div>
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
                <form action="{{ route('dana.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Nama Dompet</label>
                        <input type="text" placeholder="Masukan nama dompet" name="nama_dana" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Jumlah Saldo</label>
                        <input type="number" placeholder="Masukan jumlah saldo" name="saldo" class="form-control" >
                        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
