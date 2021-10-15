@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
   <!-- Page Header -->
   <header class="masthead mt-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{ $data['post']['title'] }}</h1>
            <div>
            @if($data['post']['featured_image'])
                <img class="img-fluid" src="{{ url($data['post']['featured_image']) }}" alt="{{ $data['post']['featured_image_caption'] }}" />
            @endif
            </div>
            <span class="meta card-footer text-muted">Posted on {{ date('M d, Y', strtotime($data['post']['created_at'])) }} by {{ auth()->user()->name }}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        {!! $data['post']['body'] !!}
        </div>
      </div>
    </div>
  </article>
@endsection
