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
                            <input disabled value="{{ $act['nama'] }}" type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">tinggi</label>
                            <input disabled type="text" value="{{ $act['tinggi'] }}" name="tinggi" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">berat</label>
                            <input disabled type="text" value="{{ $act['berat'] }}" name="berat" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">hoby</label>
                            <input disabled type="text" value="{{ $act['hobi'] }}" name="hoby" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">bmi</label>
                            <input disabled type="text" value="{{ $act['bmi'] }}" name="bmi" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">bmistatus</label>
                            <input disabled type="text" value="{{ $act['bmistatus'] }}" name="bmistatus" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">umur</label>
                            <input disabled type="text" value="{{ $act['umur'] }}" name="umur" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">statusdewasa</label>
                            <input disabled type="text" value="{{ $act['statusdewasa'] }}" name="dewasa" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konsultasi</label>
                            <input disabled type="text" value="<?php 
                            if($act['statusdewasa']=='dewasa' && $act['bmistatus']=='obesitas'){
                                echo "Anda bisa mendapatkan Konsultasi gratis.";
                            }else {
                                echo "Anda tidak dapat konsultasi gratis";
                            }
                            ?>"  name="hoby" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
