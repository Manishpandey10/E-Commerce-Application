@extends('frontend.Users.layouts.main')
@section('main')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid py-2 mt-7">
                        <div class="row">
                            <div class="ms-3">
                                @include('components.global-message')
                                <h3 class="mb-0 h4 font-weight-bolder">Welcome to your
                                    Dashboard, <strong>{{ Auth::user()->username }}</strong></h3>
                                {{-- {{ dd($user->id); }} --}}
                                <h3 class="mb-0 h4 font-weight-bolder">Email Id : <strong>{{ Auth::user()->email }}</strong>
                                </h3>
                                <div class="mt-6 mb-6">
                                    <button id="create_post" class="btn btn-info btn-md">Create Post</button>
                                    <a id="profile" href="{{ route('user.profile', $user->id) }}"
                                        class="btn btn-info btn-md">Go to Profile</a>
                                </div>
                                <p id="p1" class="mb-4 mt-4">
                                    Check the sales, value and bounce rate by country.
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi dolorum soluta maxime non
                                    quidem minus adipisci sapiente quaerat hic laboriosam quibusdam placeat, beatae iste
                                    labore numquam nam perspiciatis, recusandae enim!
                                </p>
                                {{-- @foreach ($posts as $post)
                                    <div class="content-wrapper">
                                        <!-- Content -->
                                        <div class="row mb-12 mt-7 g-6 justify-content-center">
                                            <div class="col-md-6 col-lg-4">
                                                <div class="card h-100">
                                                    <img class="card-img-top" src="{{ url('storage/' . $post->picture) }}"
                                                        alt="Card image cap" />
                                                    <div class="card-body">
                                                        <h5 class="card-title">Post Title :{{ $post->post_title }}</h5>

                                                        <h6 class="card-title">Post uploaded on: {{ $post->created_at }}
                                                            </h5>

                                                            <hr>
                                                            <p class="card-text">
                                                                <strong>Description</strong><br>
                                                                {{ $post->description }}
                                                            </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- / Content -->



                                        <div class="content-backdrop fade"></div>
                                    </div>
                                @endforeach --}}


                            </div>



                        </div>
                    </div>
                    @push('scripts')
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // $('p').css('color','green');
                                $('#create_post').click(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: "{{ route('create.post') }}",
                                        method: "GET",
                                        success: function() {
                                            window.location.href = "{{ route('create.post') }}"

                                        },
                                        error: function(error) {
                                            console.log(errror);
                                        }
                                    });

                                });
                                // $('#profile').click(function(e) {
                                //     let id = $(this).data('id');

                                //     e.preventDefault();
                                //     $.ajax({
                                //         url:'/users/user-profile/'+id ,
                                //         method:'GET',
                                //         success:function(){
                                //             window.location.href = '/users/user-profile/'+id 
                                //         },
                                //         error:function(error){
                                //             console.log(error);
                                //         }
                                //     });
                                // });
                            });
                        </script>
                    @endpush
                @endsection
