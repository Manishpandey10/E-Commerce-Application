@extends('frontend.Users.layouts.main')
@section('main')
    @foreach ($post as $post )    
    <div class="content-wrapper">
      <!-- Content -->
      <div class="row mb-12 mt-7 g-6 justify-content-center">
          <div class="col-md-6 col-lg-4">
              <div class="card h-100">
                  <img class="card-img-top" src="{{ url('storage/' . $post->picture) }}" alt="Card image cap" />
                  <div class="card-body">
                      <h5 class="card-title"><strong>Post Title</strong> :{{ $post->post_title }}</h5>
                      <hr>
                      <p class="card-text">
                          <strong>Description</strong><br>
                          {{ $post->description }}
                      </p>
                      <a href="{{ route('user.dashboard') }}" class="btn btn-outline-primary">Go To
                          User Dashboard</a>
                  </div>
              </div>
          </div>
      </div>

      <!-- / Content -->



      <div class="content-backdrop fade"></div>
  </div>
    @endforeach
@endsection
