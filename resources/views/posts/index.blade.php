@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container">
    <div class="row mt-4 mb-4 pt-3">
        @foreach ($posts as $post)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{ $post->title }}</h3>
                <div class="mb-1 text-muted">By <span style="font-weight: bold; font-style: italic;">{{ $post->admin->name }}</span>, {{ date('jS M Y', strtotime($post->udpated_at)) }}</div>
                <p class="card-text mb-auto">{{ $post->summary }}</p>
                <a href="/blog/{{ $post->slug }}" class="stretched-link">Continue reading</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="/images/{{ $post->image_path }}" style="object-fit: cover;" width="250" height="250" alt="">
              </div>
            </div>
          </div>
        @endforeach

@endsection
