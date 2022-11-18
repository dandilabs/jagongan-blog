@extends('backend.home')
@section('sub-title','Tag')
@section('sub-judul' ,'Tag')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('tag.create') }}" class="btn btn-sm btn-success">
    <i class="fas fa-pen"></i> Add Tag
</a>
<table class="table mt-3">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name Tag</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tag as $result => $hasil )
        <tr>
            <td>{{ $result + $tag->firstitem() }}</td>
            <td>{{ $hasil->name }}</td>
            <td>{{ $hasil->slug }}</td>
            <td>
                <form action="{{ route('tag.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('tag.edit', $hasil->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-pen"></i> Edit
                    </a>
                    <button href="" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $tag->links() }}
@endsection