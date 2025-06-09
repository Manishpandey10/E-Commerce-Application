@extends('frontend.layouts.main')

@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">Edit the color</h5>
                </div>
                <div class="card-body">

                    <form id="updateForm" data-id={{ $color->id }} class="mb-6" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-6 mb-4">
                                <label for="username" class="form-label">Enter Color Name</label>
                                <input type="text" class="form-control" id="username" name="name"
                                    placeholder="Enter name of product" autofocus value="{{ $color->name }}" />
                                <span id="name" class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-6 mb-6">
                                <label class="form-file" for="basic-default-message">Upload Thumbnail</label>
                                <input type="file" accept="image/jpeg, image/jpg, image/png" name="colorthumbnail"
                                    id="basic-default-message" class="form-control"></input>
                                <small id="emailHelp" class="form-text text-muted">Supported file formats = .JPG,.PNG,
                                    .JPEG</small>
                                <span class="text-danger">
                                    @error('colorthumbnail')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="category" class="form-label">Status</label>

                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected>Status </option>
                                    <option value="1" {{ $color->status == '1' ? 'selected' : '' }}>
                                        Listed</option>
                                    <option value="0" {{ $color->status == '0' ? 'selected' : '' }}>
                                        Unlisted</option>
                                </select>

                                <span id="status" class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="my-7">
                                <button class="btn btn-primary d-grid btn-md">Update Color</button>

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
                                    url: '{{ url('admin/add-new-color/edit') }}/' + productId,
                                    method: "POST",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(res) {
                                        if (res.status === 'success') {
                                            console.log(res);
                                            
                                            sessionStorage.setItem('colorEdit', res.colorEdit);
                                            window.location.href = "{{ route('manage.color') }}"
                                        }
                                    },
                                    error:function(error){
                                        console.log(error);
                                        let formError = error.responseJSON.errors;
                                        $('.text-danger').html('');
                                        if(formError.name){
                                            $('#name').html(formError.name[0]);
                                        }
                                        if(formError.status){
                                            $('#status').html(formError.status[0]);
                                        }
                                    }
                                });
                            });
                        });
                    </script>
                @endpush
            @endsection
