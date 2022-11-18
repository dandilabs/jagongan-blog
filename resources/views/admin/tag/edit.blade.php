@extends('backend.home')
@section('sub-title','Edit Tag')
@section('sub-judul' ,'Edit Tag')
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
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form action="{{ route('tag.update' , $tag->id )}}" method="POST">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label>Tag Name</label>
                        <input type="text" class="form-control" required="" name="name" value="{{ $tag->name }}">
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