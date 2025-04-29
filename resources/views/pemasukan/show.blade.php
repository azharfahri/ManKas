@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <d class="card">
                <div class="card-header">Data Pemasukan</div>
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
            <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" placeholder="" value="{{ $pemasukan->deskripsi }}" name="deskripsi" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="text" placeholder="" value="{{ $pemasukan->jumlah }}" name="jumlah" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nama Dompet</label>
                    <select class="form-control" name="id_dana" disabled >
                        @foreach($dana as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $pemasukan->id_dana ? 'selected' : '' }} >{{ $data->nama_dana }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('pemasukan.index') }}" class="btn btn-danger">Back</a>
                
            </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
