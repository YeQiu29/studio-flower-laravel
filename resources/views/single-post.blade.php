@extends('layouts.app')

@section('title', $post->title)

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="display-4 mb-4">{{ $post->title }}</h1>
        <p class="text-muted">Published on {{ $post->created_at->format('M d, Y') }}</p>
        
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-4" alt="{{ $post->title }}">
        @endif

        <div class="blog-content">
            {!! nl2br(e($post->content)) !!}
        </div>

        <a href="{{ route('blog') }}" class="btn btn-secondary mt-5">Back to Blog</a>
    </div>
</section>
@endsection
