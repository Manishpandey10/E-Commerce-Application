@extends('frontend.layouts.main')

@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div  class="card-header d-flex justify-content-between align-items-center">
                    {{-- @include('components.global-message') --}}
                    <h5 class="mb-0">Edit the product category</h5>
                </div>
                <div class="mx-5">
                    <small class="form-text text-muted">Edit the details you want to edit for the existing product
                        category</small>
                </div>
                <div class="card-body">

                    <form id="updateForm" class="mb-6" data-id={{ $categorydata->id }} enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-6 mb-4">
                                <label for="username" class="form-label">Product Category Name</label>
                                <input type="text" class="form-control" id="username"
                                    placeholder="Enter Product category name" name="categoryname"
                                    placeholder="Enter name of category" autofocus
                                    value="{{ $categorydata->categoryname }}" />
                                <span id="categoryname" class="text-danger">
                                    @error('categoryname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="col-6 mb-6">
                                <label class="form-label" for="description">Enter description</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="description" class="form-control"
                                        placeholder="Enter description for product category" name="productDescription"
                                        rows="3" value="{{ $categorydata->productDescription }}"></input>
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
                                <span class="text-danger">
                                    @error('thumbnail')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class=" col-6 mb-4">
                                <label for="metatitle" class="form-label">Meta title</label>
                                <input type="text" class="form-control" placeholder="Enter meta title" id="metatitle"
                                    value="{{ $categorydata->metaTitle }}" name="metaTitle"
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
                                        placeholder="Enter meta description" name="metaDescription" rows="3"
                                        value="{{ $categorydata->metaDescription }}"></input>
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
                                    <option value="1" {{ $categorydata->productStatus == '1' ? 'selected' : '' }}>
                                        Listed</option>
                                    <option value="0" {{ $categorydata->productStatus == '0' ? 'selected' : '' }}>
                                        Unlisted</option>

                                </select>
                                <span id="productStatus" class="text-danger">
                                    @error('productStatus')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="my-7">
                                <button class="btn btn-primary d-grid btn-md">Update</button>

                            </div>



                    </form>

                </div>
            @push('scripts')
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#updateForm').on('submit',function(e){
                            e.preventDefault();
                            let productId = $(this).data('id');
                            $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                            });
                            let formData = new FormData(this);
                             $.ajax({
                                    url: '{{ url('admin/manage-products/edit') }}/' + productId,
                                    method: "POST",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(res) {
                                       console.log(res);
                                       if(res.status === 'success'){
                                        window.location.href = "{{ route('manage.product') }}"
                                        sessionStorage.setItem('updateSuccess','The product category details has been updated');
                                    }
                                    },
                                    error: function(error) {
                                        console.log(error);
                                        let formError = error.responseJSON.errors;
                                        $('.text-danger').html('');
                                        if(formError.categoryname){
                                            $('#categoryname').html(formError.categoryname[0]);
                                        }
                                        if(formError.productDescription){
                                            $('#productDescription').html(formError.productDescription[0]);
                                        }
                                        if(formError.productStatus){
                                            $('#productStatus').html(formError.productStatus[0]);
                                        }
                                        
                                        
                                    }

                                });

                        })
                    });
                </script>
            @endpush    
            @endsection
