@extends('frontend.layouts.main')

@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new product</h5>
                    {{-- {{ dd($productdata->category); }} --}}
                    {{-- {{ dd($colors); }} cheking whether the colors data is sent to this blade. --}}
                    <span class="text-success">
                        @include('components.global-message')
                    </span>
                </div>
                <div class="card-body">

                    <form id="updateForm" class="mb-6" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-6 mb-4">
                                <label for="username" class="form-label">Enter Product Name</label>
                                <input type="text" class="form-control" id="username" name="productname"
                                    placeholder="Enter name of Product" autofocus value="{{ old('productname') }}" />
                                <span id="productname" class="text-danger">
                                    @error('productname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-4">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" aria-label="Default select example" name="productCategory">
                                    <option value="" selected>Select Product Category </option>
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('productCategory') == $data->id ? 'selected' : '' }}>
                                            {{ $data->categoryname }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="productCategory" class="text-danger">
                                    @error('productCategory')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-6 mb-6">
                                <label class="form-label" for="description">Enter product description</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="description" class="form-control"
                                        placeholder="Enter description for the products" name="productDescription"
                                        rows="3" value="{{ old('productDescription') }}"></input>
                                    <span class="input-group-text cursor-pointer"></span>
                                </div>
                                <span id="productDescription" class="text-danger">
                                    @error('productDescription')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col-6 mb-6">
                                <label class="form-file" for="basic-default-message">Upload Thumbnail</label>
                                <input type="file" accept="image/jpeg, image/jpg, image/png" name="thumbnail"
                                    id="basic-default-message" class="form-control"></input>
                                <small id="emailHelp" class="form-text text-muted">Supported file formats = .JPG,.PNG,
                                    .JPEG</small>
                                <br>
                                <span id="thumbnail" class="text-danger">
                                    @error('thumbnail')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class=" col-6 mb-4">
                                <label for="metatitle" class="form-label">Meta title</label>
                                <input type="text" class="form-control" id="metatitle" value="{{ old('metaTitle') }}"
                                    name="metaTitle" placeholder="Enter meta title" />
                                <span class="text-danger">
                                    @error('metaTitle')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-6 mb-6">
                                <label class="form-label" for="metadescription">Enter meta description</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="metadescription" class="form-control"
                                        placeholder="Enter meta description for the product " name="metaDescription"
                                        rows="3" value="{{ old('metaDescription') }}"></input>
                                    <span class="input-group-text cursor-pointer"></span>
                                </div>
                                <span class="text-danger">
                                    @error('metaDescription')
                                        {{ $message }}
                                    @enderror
                                </span>


                            </div>

                            <div class="col-6 mb-4">
                                <label for="category" class="form-label">Color</label>
                                <select class="form-select" aria-label="Default select example" name="color">
                                    <option value="" selected>Select Color</option>
                                    @foreach ($colors as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('color') == $data->id ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="color" class="text-danger">
                                    @error('color')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-4">
                                <label for="category" class="form-label">Theme</label>
                                <select class="form-select" aria-label="Default select example" name="theme">
                                    <option value="" selected>Select theme</option>
                                    @foreach ($theme as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('theme') == $data->id ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span id="theme" class="text-danger">
                                    @error('theme')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="category" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="productStatus">
                                    <option selected>Status </option>
                                    <option value="0"{{ old('productStatus') == '0' ? 'selected' : '' }}>Unlisted
                                    </option>
                                    <option value="1"{{ old('productStatus') == '1' ? 'selected' : '' }}>
                                        Listed
                                    </option>
                                </select>
                                <span id="productStatus" class="text-danger">
                                    @error('productStatus')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="my-7">
                                <button class="btn btn-primary d-grid btn-md">Add new product</button>

                            </div>



                    </form>

    </div>
@push('scripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#updateForm').on('submit',function(e){
                    e.preventDefault();
                    let formData = new FormData(this);
                    $.ajax({
                        url:"{{ route('addProduct.submit') }}",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:function(res){
                            if(res.status === 'success'){
                                console.log(res);
                                window.location.href = "{{ route('product.list') }}"
                            }
                        },
                        error:function(error){
                            console.log(error);
                        

                        const formError = error.responseJSON.errors;
                        $('.text-danger').html('');

                        if( formError.productname ){
                            $("#productname").html(formError.productname[0]);
                        }
                        if( formError.productCategory ){
                            $('#productCategory').html(formError.productCategory[0]);
                        }
                        if( formError.productDescription ){
                            $('#productDescription').html(formError.productDescription[0]);
                        }
                        if( formError.thumbnail ){
                            $('#thumbnail').html(formError.thumbnail[0]);
                        }
                        if( formError.color ){
                            $('#color').html(formError.color[0]);
                        }
                        if( formError.theme ){
                            $("#theme").html(formError.theme[0]);
                        }
                        if( formError.productStatus ){
                            $("#productStatus").html(formError.productStatus[0]);
                        }
                        }
                    });
                });
                });
            </script>
@endpush
@endsection
