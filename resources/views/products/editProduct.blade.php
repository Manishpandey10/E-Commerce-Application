@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">Edit the product category</h5>
                </div>
                <div class="mx-5">
                    <small class="form-text text-muted">Edit the details you want to edit for the existing product
                        category</small>
                </div>
                <div class="card-body">

                    <form id="updateForm" class="mb-6" data-id= "{{ $productdata->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-6 mb-4">
                                <label for="username" class="form-label">Enter Product Name</label>
                                <input type="text" class="form-control" id="username" name="productname"
                                    placeholder="Enter name of product" autofocus value="{{ $productdata->productname }}" />
                                <span id="productname" class="text-danger">
                                    @error('productname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-4">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" aria-label="Default select example" name="productCategory">
                                    <option value="" selected>Select Theme</option>
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $productdata->category->id == $data->id ? 'selected' : '' }}>
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
                                <label class="form-label" for="description">Enter Product description</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="description" class="form-control"
                                        placeholder="Enter description of the product" name="productDescription"
                                        rows="3" value="{{ $productdata->productDescription }}"></input>
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
                                <input type="file" accept="image/jpeg, image/jpg, image/png" name="productthumbnail"
                                    id="basic-default-message" class="form-control"></input>
                                <small id="emailHelp" class="form-text text-muted">Supported file formats = .JPG,.PNG,
                                    .JPEG</small>
                                <span id="productthumbnail" class="text-danger">
                                    @error('productthumbnail')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class=" col-6 mb-4">
                                <label for="metatitle" class="form-label">Meta title</label>
                                <input type="text" class="form-control" id="metatitle"
                                    value="{{ $productdata->metaTitle }}" name="metaTitle"
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
                                    <input type="text" id="metadescription" class="form-control"
                                        placeholder="Enter meta description for the product" name="metaDescription"
                                        rows="3" value="{{ $productdata->metaDescription }}"></input>
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
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}"
                                            {{ $productdata->color->id == $color->id ? 'selected' : '' }}>
                                            {{ $color->name }}
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
                                    <option value="" selected>Select Theme</option>
                                    @foreach ($theme as $theme)
                                        <option value="{{ $theme->id }}"
                                            {{ $productdata->theme->id == $theme->id ? 'selected' : '' }}>
                                            {{ $theme->name }}
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
                                    <option value="1" {{ $productdata->productStatus == '1' ? 'selected' : '' }}>
                                        Listed</option>
                                    <option value="0" {{ $productdata->productStatus == '0' ? 'selected' : '' }}>
                                        Unlisted</option>
                                </select>

                                <span id="productStatus" class="text-danger">
                                    @error('productStatus')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="my-7">
                                <button class="btn btn-primary d-grid btn-md">Update Product</button>

                            </div>



                    </form>

                </div>
                @push('scripts')
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#updateForm').on('submit', function(e) {
                                e.preventDefault();
                                let productId = $(this).data('id');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                let formData = new FormData(this);
                                $.ajax({
                                    url: '{{ url('admin/product-list/edit') }}/' + productId,
                                    method: "POST",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(res) {
                                        if (res.status === 'success') {
                                            console.log(res);
                                            window.location.href = "{{ route('product.list') }}"
                                        }
                                    },
                                    error: function(error) {
                                        console.log(error);
                                        let formError = error.responseJSON.errors;
                                        $('.text-danger').html('');
                                        if (formError.productname) {
                                            $('#productname').html(formError.productname[0]);
                                        }
                                        if (formError.productCategory) {
                                            $('#productCategory').html(formError.productCategory[0]);
                                        }
                                        if (formError.productDescription) {
                                            $('#productDescription').html(formError.productDescription[0]);
                                        }
                                        if (formError.color) {
                                            $('#color').html(formError.color[0]);
                                        }
                                        if (formError.theme) {
                                            $('#theme').html(formError.theme[0]);
                                        }
                                        if (formError.productStatus) {
                                            $('#productStatus').html(formError.productStatus[0]);
                                        }
                                        
                                    }

                                });
                            });


                        });
                    </script>
                @endpush
            @endsection
