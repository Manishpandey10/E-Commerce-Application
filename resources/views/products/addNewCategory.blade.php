@extends('frontend.layouts.main')

@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new product category</h5>
                    <span>
                        @include('components.global-message')
                    </span>
                </div>
                <div class="card-body">

                    <form id="formAuthentication" class="mb-6" method="POST" action="{{ route('addnewproduct') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-6 mb-4">
                                <label for="username" class="form-label">Product Category Name</label>
                                <input type="text" class="form-control" id="username" name="categoryname"
                                    placeholder="Enter name of category" autofocus value="{{ old('categoryname') }}" />
                                    <span class="text-danger">
                                        @error('categoryname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                           
                            <div class="col-6 mb-6">
                                <label class="form-label" for="description">Enter description</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="description" placeholder="Enter description for the product category" class="form-control" name="productDescription" rows="3" value="{{ old('productDescription') }}"></input>
                                    <span class="input-group-text cursor-pointer"></span>
                                </div>
                                <span class="text-danger">
                                    @error('productDescription')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col-12  mb-6">
                                <label class="form-file" for="basic-default-message">Upload Thumbnail</label>
                                <input type="file" accept="image/jpeg, image/jpg, image/png" name="thumbnail"
                                    id="basic-default-message" class="form-control"></input>
                                    <small id="emailHelp" class="form-text text-muted">Supported file formats = .JPG,.PNG, .JPEG</small>
                                    <br>
                                    <span class="text-danger">
                                        @error('thumbnail')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                            <div class=" col-6 mb-4">
                                <label for="metatitle" class="form-label">Meta title</label>
                                <input type="text" class="form-control" id="metatitle" value="{{ old('metaTitle') }}" name="metaTitle"
                                    placeholder="Enter meta title" />
                                <span class="text-danger">
                                    @error('metaTitle')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            
                            <div class="col-6 mb-6">
                                <label class="form-label" for="metadescription">Enter meta description</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="metadescription" placeholder="Enter meta description" class="form-control" name="metaDescription" rows="3" value="{{ old('metaDescription') }}"></input>
                                    <span class="input-group-text cursor-pointer"></span>
                                </div>
                                <span class="text-danger">
                                   @error('metaDescription')
                                       {{ $message }}
                                   @enderror
                               </span>


                            </div>
                            <div class="col-12 mb-4">
                                <label for="category" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="productStatus">
                                    <option selected>Status </option>
                                    <option value="0"{{ old('productStatus')=='0'?'selected': '' }}>Unlisted</option>
                                    <option value="1"{{ old('productStatus')=='1'?'selected': '' }}>Listed</option>
                                </select>
                                <span class="text-danger">
                                    @error('productStatus')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="my-7">
                                <button class="btn btn-primary d-grid btn-md">Add new product category</button>

                            </div>



                    </form>

                </div>
            @endsection
