@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kategori</div>

                <div class="card-body">
                    <a href="{{ route('kategori.create') }}" class="btn btn-success">Add Kategori</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $item)    
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->kategori_name }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('kategoridel', $item->id) }}" class="btn btn-danger">Delete</a>
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
