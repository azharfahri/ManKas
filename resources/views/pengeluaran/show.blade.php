@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <d class="card">
                <div class="card-header">Data pengeluaran</div>
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
            <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" placeholder="" value="{{ $pengeluaran->deskripsi }}" name="deskripsi" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="text" placeholder="" value="{{ $pengeluaran->jumlah }}" name="jumlah" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nama Dompet</label>
                    <select class="form-control" name="id_dana" disabled >
                        @foreach($dana as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $pengeluaran->id_dana ? 'selected' : '' }} >{{ $data->nama_dana }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-danger">Back</a>
                
            </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
