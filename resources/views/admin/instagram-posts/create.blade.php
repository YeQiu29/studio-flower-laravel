@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create Instagram Post</h1>
    <form action="{{ route('admin.instagram-posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" id="link" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
