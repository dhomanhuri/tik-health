@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card text-center">
                <div class="card-header">artikel</div>

                <div class="card-body">
                    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">judul</label>
                            <input type="text" name="judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">isi</label>
                            <input type="text" name="isi" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">tanggal</label>
                            <input type="text" name="tanggal" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">KAteogir</label>
                            <select class="form-select" name="kategori_id" aria-label="Default select example">
                                <option selected>Click to select role</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->kategori_name }}</option>
                                @endforeach
                            </select>
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
