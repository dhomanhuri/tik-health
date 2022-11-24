@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card text-center">
                <div class="card-header">Kategori</div>

                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kategori Name</label>
                            <input type="text" name="kategori_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
