@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Instagram Posts</h1>
    <a href="{{ route('admin.instagram-posts.create') }}" class="btn btn-primary">+ Post Insta</a>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><img src="{{ asset('storage/' . $post->image_path) }}" alt="" width="100"></td>
                    <td><a href="{{ $post->link }}" target="_blank">{{ $post->link }}</a></td>
                    <td>
                        <a href="{{ route('admin.instagram-posts.edit', $post) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.instagram-posts.destroy', $post) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
@endsection
