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
            <form action="{{ route('dana.update', $dana->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                <label class="form-label">Nama Dompet</label>
                <input type="text" placeholder="" value="{{ $dana->nama_dana }}" name="nama_dana" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">saldo</label>
                    <input type="text" placeholder="" value="{{ $dana->saldo }}" name="saldo" class="form-control" disabled>
                </div>
                
                <a href="{{ route('dana.index') }}" class="btn btn-danger">Back</a>
                
            </form>
                </div>
                
                
                </div>
        </div>
    </div>
</div>
@endsection
