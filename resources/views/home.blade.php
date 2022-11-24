@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card text-center">
                <div class="card-header">BMI</div>

                <div class="card-body">
                    <form action="{{ url('/actbmi') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">tinggi</label>
                            <input type="text" name="tinggi" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">berat</label>
                            <input type="text" name="berat" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">hoby</label>
                            <input type="text" name="hoby" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">tahun lahir</label>
                            <input type="text" name="tahun" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
