@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container" style="max-width: 800px; margin: auto;">
    <h2 class="py-4">{{ $post->title }}</h2>

    <div class="mb-3 text-muted">By <span style="font-weight: bold; font-style: italic;">{{ $post->admin->name }}</span>, {{ date('jS M Y', strtotime($post->udpated_at)) }}</div>


    <div>
        <img src="/images/{{ $post->image_path }}" height="440" style="max-width: 100%;" alt="">
    </div>

    <div style="font-size: 1.1rem;" class="text-dark py-4 my-3">
        {{ $post->description }}
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary my-4">Go Back</a>
</div>

@endsection
