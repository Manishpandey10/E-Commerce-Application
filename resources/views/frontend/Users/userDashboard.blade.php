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
                                    <button id="profile" data-id={{ $user->id }} class="btn btn-info btn-md">Go to Profile</button>
                                </div>
                                <p id="p1" class="mb-4 mt-4">
                                    Check the sales, value and bounce rate by country.
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi dolorum soluta maxime non
                                    quidem minus adipisci sapiente quaerat hic laboriosam quibusdam placeat, beatae iste
                                    labore numquam nam perspiciatis, recusandae enim!
                                </p>
                             

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
                                        url:"{{ route('create.post') }}",
                                        method:"GET",
                                        success:function(){
                                            window.location.href = "{{ route('create.post') }}"

                                        },
                                        error:function(error){
                                            console.log(errror);
                                        }
                                    });

                                });
                                $('#profile').click(function(e) {
                                    let id = $(this).data('id');

                                    e.preventDefault();
                                    $.ajax({
                                        url:'/users/user-profile/'+id ,
                                        method:'GET',
                                        success:function(){
                                            window.location.href = '/users/user-profile/'+id 
                                        },
                                        error:function(error){
                                            console.log(error);
                                        }
                                    });
                                });
                            });
                               
                        </script>
                    @endpush
                @endsection
