@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data pengeluaran</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('pengeluaran.create') }}" type="button" class="btn btn-primary">Tambah</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Nama Dompet</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($pengeluaran as $data)
                            <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->deskripsi }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->dana->nama_dana }}</td>
                            <td>
                                <form action="{{ route('pengeluaran.destroy',$data->id) }}" method="POST">
                                <a href="{{ route('pengeluaran.edit',$data->id) }}" type="button" class="btn btn-success">Edit</a>
                                <a href="{{ route('pengeluaran.show',$data->id) }}" type="button" class="btn btn-warning">Lihat</a>
                                
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
