@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Instagram Post</h1>
    <form action="{{ route('admin.instagram-posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="" width="100">
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ $post->link }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
