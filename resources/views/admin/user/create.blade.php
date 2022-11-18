@extends('backend.home')
@section('sub-title','Add Users')
@section('sub-judul' ,'Add Users')
@section('content')

@if (count($errors) > 0)
    @foreach ($errors->all() as $error  )
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<a href="{{ route('user.index') }}" class="btn btn-sm btn-warning">
    <i class="fas fa-arrow-left"></i> Back
</a>
<div class="row mt-3">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name User</label>
                        <input type="text" class="form-control" required="" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email User</label>
                        <input type="email" class="form-control" required="" name="email">
                    </div>
                    <div class="form-group">
                        <label>User type</label>
                        <select name="tipe" class="form-control" id="">
                            <option value="" holder>Select type user</option>
                            <option value="1" holder>Administrator</option>
                            <option value="0" holder>Author</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection