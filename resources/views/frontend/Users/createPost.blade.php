@extends('frontend.Users.layouts.main')

@section('main')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h5 class="mb-0">Create a new Post</h5>
                    <span>
                        @include('components.global-message')
                    </span>
                </div>
                <div class="card-body">

                    <form id="updateForm" class="mb-6" action="{{ route('make.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class=" col-12 col-md-8 col-lg-6 ">
                                <label for="username" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="Category_name" name="post_title"
                                    placeholder="Enter Title for the Post" autofocus value="{{ old('post_title') }}" />
                                    <span id="post_title" class="text-danger">
                                        @error('post_title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                           
                          
                            <div class=" col-12 col-md-8 col-lg-6 ">
                                <label class="form-file" for="basic-default-message">Upload Picture</label>
                                <input type="file" accept="image/jpeg, image/jpg, image/png" name="picture"
                                    id="basic-default-message" class="form-control"></input>
                                    <small id="emailHelp" class="form-text text-muted">Supported file formats = .JPG,.PNG, .JPEG</small>
                                    <br>
                                    <span id="picture" class="text-danger">
                                        @error('picture')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                              <div class=" col-12 mb-6">
                                <label class="form-label" for="description">Enter description</label>
                                <div class="input-group input-group-merge">
                                    <textarea type="text" id="description" placeholder="Enter description for Your Post" class="form-control" name="description" rows="3" >{{ old('description') }}</textarea>
                                    <span class="input-group-text cursor-pointer"></span>
                                </div>
                                <span id="description" class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="my-7">
                                <button class="btn btn-primary d-grid btn-md">Add new post</button>


                            </div>



                    </form>

    </div>
    @push('scripts')
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
         <script>
            $(document).ready(function(){

            });
         </script>
    @endpush
@endsection    