@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card text-center">
                <div class="card-header">user</div>

                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">role</label>
                            <select class="form-select" name="role" aria-label="Default select example">
                                <option selected>Click to select role</option>
                                <option value="admin">admin</option>
                                <option value="editor">editor</option>
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
