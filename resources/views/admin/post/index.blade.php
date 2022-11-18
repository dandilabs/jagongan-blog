@extends('backend.home')
@section('sub-title','Post')
@section('sub-judul' ,'Post')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('post.create') }}" class="btn btn-sm btn-success">
    <i class="fas fa-pen"></i> Add Post
</a>
<table class="table mt-3">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Judul Post</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Creator</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($post as $result => $hasil )
        <tr>
            <td>{{ $result + $post->firstitem() }}</td>
            <td>{{ $hasil->judul }}</td>
            <td>{{ $hasil->category->name }}</td>
            <td>
                @foreach ($hasil->tags as $tag )
                    <ul>
                        <h6><span class="badge badge-info">{{ $tag->name }}</span></h6>
                    </ul>
                @endforeach
            </td>
            <td>{{ $hasil->users->name }}</td>
            <td><img src="{{ asset($hasil->image) }}" class="img-fluid" width="100px" alt=""></td>
            <td>
                <form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('post.edit', $hasil->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-pen"></i> Edit
                    </a>
                    <button href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $post->links() }}
@endsection