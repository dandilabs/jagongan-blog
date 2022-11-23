@extends('backend.home')
@section('sub-title','Add Post')
@section('sub-judul' ,'Add Post')
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
<a href="{{ route('post.index') }}" class="btn btn-sm btn-warning">
    <i class="fas fa-arrow-left"></i> Back
</a>
<div class="row mt-3">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" required="" name="judul">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="category-option" name="category_id">
                            <option value="" holder>Select Category</option>
                            @foreach ($category as $result )
                                <option value="{{ $result->id }}">{{ $result->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Tags</label>
                        <select class="form-control select2" name="tags[]" multiple="" data-height="100%">
                            @foreach ($tags as $tag )
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" required="required" name="image">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection