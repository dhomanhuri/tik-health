@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">artikel</div>

                <div class="card-body">
                    <a href="{{ route('artikel.create') }}" class="btn btn-success">Add artikel</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">judul</th>
                                <th scope="col">foto</th>
                                <th scope="col">isi</th>
                                <th scope="col">tanggal</th>
                                <th scope="col">kategori</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikel as $item)    
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->judul }}</td>
                                <td><img src="{{ asset('storage/'.$item->foto) }}" width="70px" alt=""></td>
                                <td>{{ $item->isi }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->kategori->kategori_name }}</td>
                                <td>
                                    <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('artikeldel', $item->id) }}" class="btn btn-danger">Delete</a>
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
