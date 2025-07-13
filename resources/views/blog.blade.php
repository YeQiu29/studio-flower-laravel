@extends('layouts.app')

@section('title', 'Our Blog')

@section('content')
<section class="py-5 pt-header-offset">
    <div class="container">
        <h1 class="display-4 text-center mb-4">Our Blog</h1>
        <p class="lead text-center">Stay updated with our latest news, tips, and floral inspirations.</p>
        
        <div class="row mt-5">
            @forelse($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @else
                        <img src="{{ asset('images/placeholder.jpg') }}" class="card-img-top" alt="Placeholder Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">No blog posts found.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection