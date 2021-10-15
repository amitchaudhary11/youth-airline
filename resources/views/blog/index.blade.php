@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container">
      <div class="row">

      <!-- All Post -->
        <div class="col-md-8" id="myTable">
          @foreach($data['posts'] as $d) 
          <div class="card mb-3 mt-4">
              <img style="max-width: 100%;" src="{{ url($d['featured_image']) }}" alt="{{ $d['featured_image_caption'] }}" />
            <div class="card-body">
              <h5 class="card-title"><a href="{{ url($d['slug']) }}" class="text-decoration-none text-dark">{{ $d['title'] }}</a></h5>
              <!-- <p class="card-text text-secondary">{!! $d['summary'] !!}</p> -->
              <button type="button" class="btn btn-primary mb-3 rounded">
              <a href="{{ url($d['slug']) }}" class="text-white text-decoration-none d-block">Read More</a>  
              </button>
              <div class="card-footer text-muted">
                  Posted on {{ date('M d, Y', strtotime($d['created_at'])) }} by {{ auth()->user()->name }}
              </div>
            </div>
          </div>
          @endforeach
          <div class="d-flex justify-content-center">
            {!! $data['posts']->links() !!}
        </div>
        </div>

      <!-- Search Box -->
      
        <div class="col-md-4 mt-4">
            <div class="card text-center border-0">
              <div class="card-header text-left text-white" style="background: #213240;">
                <h5>Search</h5>
              </div>
              <div class="card-body">
                  <div class="input-group">
                      <input id="myInput" onkeyup="myfilter()" type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-info text-white ml-1" type="button">Go!</button>
                      </span>
                   </div>
              </div>
            </div>

            <!-- Recent Post -->

              <div class="bg-white mt-5 mb-3">
              <h5 class="text-white py-3 card-header" style="padding-left: 20px; padding-right: 20px; background: #213240;">Recent Post</h5>
                        @foreach($data['recent_posts'] as $recent_post)
                        <div class="media post_item pt-3" style="padding-left: 20px; padding-right: 20px;">
                        <a style="max-width: 30%;" href="{{ url($recent_post['slug']) }}">
                           <img 
                           src="{{ url($recent_post['featured_image']) }}" 
                           style="max-width: 100%;" 
                           alt="post">
                        </a>
                           <div class="media-body pl-3">
                              <a href="{{url($recent_post['slug'])}}" class="text-dark text-decoration-none">
                                 <h5>{{ $recent_post['title'] }}</h5>
                              </a>
                              <p>{{ date('M d, Y', strtotime($recent_post['created_at'])) }}</p>
                           </div>
                        </div>
                        @endforeach
              </div>

            <!-- Categories -->
              <div class="sidebar-box mt-5">
              <h5 class="text-white py-3 card-header" style="padding-left: 20px; padding-right: 20px; background: #213240;">Categories</h5>
              <ul class="categories list-unstyled bg-white pb-3" style="padding-left: 20px; padding-right: 20px;">
              @foreach($data['topics'] as $topic)
                <li class="py-3 border-bottom"><a href="/topic/{{ $topic['slug'] }}" class="text-decoration-none text-capitalize text-muted" style="font-size: 1rem;">{{ $topic['name'] }}</a></li>
              @endforeach
              </ul>
            </div>

            <!-- Tags -->
              <div class="mt-5 mb-3">
              <h5 class="text-white py-3 card-header" style="padding-left: 20px; padding-right: 20px; background: #213240;">Tags</h5>
                  <ul class="list-unstyled d-inline-flex flex-wrap mt-2">
                  @foreach($data['tags'] as $tag)
                     <li>
                        <a href="/tag/{{ $tag['slug'] }}" 
                        class="btn btn-outline-primary my-2 ml-2 text-capitalize">{{ $tag['name'] }}</a>
                     </li>
                  @endforeach
                  </ul>
              </div>
        </div>


      </div>
    </div>

    <script>
        function myfilter() {
    var input, filter, table, h5, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    h5 = table.getElementsByClassName("card");
    for (i = 0; i < h5.length; i++) {
        a = h5[i].getElementsByTagName("a")[0];
        if (a) {
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            h5[i].style.display = "";
        } else {
            h5[i].style.display = "none";
            
        }
        }       
    }
    }
    
    </script>
@endsection
