@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kategori</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('kategori.create') }}" type="button" class="btn btn-primary">Tambah</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name kategori</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($kategori as $data)
                            <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->nama_kategori }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>
                                <form action="{{ route('kategori.destroy',$data->id) }}" method="POST">
                                <a href="{{ route('kategori.edit',$data->id) }}" type="button" class="btn btn-success">Edit</a>
                                <a href="{{ route('kategori.show',$data->id) }}" type="button" class="btn btn-warning">Show</a>
                                
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
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
