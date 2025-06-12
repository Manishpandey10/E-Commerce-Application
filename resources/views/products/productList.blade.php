@extends('frontend.layouts.main')
@section('main-container')
    <!-- Bordered Table -->
    <div class="card mx-4 mt-6">
        <div>
            <span id="alert_msg" class="mx-6 mb-2 text-success">
                @include('components.global-message')
            </span>
            <h5 class="card-header">Manage Products Listed </h5>
        </div>
        <div class="mx-6">
            <button type="button" class=" btn btn-light " id="edit" name="edit"><a href="{{ route('addProduct') }}"
                    class="link-primary">Add new Product </a>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product details</th>

                            <th>Product Description</th>

                            <th>Created At</th>
                            <th>Status</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productdata as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->productname }}
                                    <div>
                                        {{-- Thumbnail --}}
                                        <img src="{{ url('storage/' . $data->productthumbnail) }}" width="50px"
                                            height="50px" alt="Thumbnail">
                                    </div>
                                    <div>
                                        @if ($data->color->status == 0)
                                            <span class="text-danger">{{ $data->color->name }}</span>
                                        @else
                                            <span class="text-success">{{ $data->color->name }}</span>
                                        @endif
                                    </div>
                                    <div>
                                        @if ($data->theme->status == 0)
                                            <span class="text-danger">{{ $data->theme->name }}</span>
                                        @else
                                            <span class="text-success">{{ $data->theme->name }}</span>
                                        @endif
                                    </div>
                                    <div>
                                        @if ($data->category->productStatus == 0)
                                            <span class="text-danger">{{ $data->category->categoryname }}</span>
                                        @else
                                            <span class="text-success">{{ $data->category->categoryname }}</span>
                                        @endif
                                    </div>
                                </td>


                                <td>{{ $data->productDescription }}</td>



                                <td>{{ $data->created_at }}</td>

                                @if ($data->productStatus == '0')
                                    <td>
                                        <span class="text-danger text-dangers">Unlisted</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="text-success text-successs">Listed</span>
                                    </td>
                                @endif

                                <td><button type="button" class=" btn btn-primary edit-btn" data-id="{{ $data->id }}"
                                        name="edit ">Edit</button>&nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary dlt-btn"
                                        data-id="{{ $data->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {

                const added = sessionStorage.getItem('newProductAdded');
                const deletedMsg = sessionStorage.getItem('deleted');
                const updateMsg = sessionStorage.getItem('productupdated');
                $("#alert_msg").html('');
                if (deletedMsg) {
                    $("#alert_msg").html(
                        `<div class="alert alert-danger alert-dismissible" role="alert">${deletedMsg} </div>`);

                } else if (added) {
                    $("#alert_msg").html(
                        `<div class="alert alert-success alert-dismissible" role="alert">${added} </div>`);
                    sessionStorage.clear();
                } else if (updateMsg) {
                    $("#alert_msg").html(
                        `<div class="alert alert-success alert-dismissible" role="alert">${updateMsg} </div>`);
                    sessionStorage.clear();
                } else {
                    $("#alert_msg").hide();
                }
                setTimeout(function() {
                    $("#alert_msg").fadeOut();
                    sessionStorage.clear();
                }, 2000);

            });

            //deleting data 

            $('.dlt-btn').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                console.log(productId);


                if (confirm('are your sure you want to delete this product ?')) {
                    $.ajax({
                        url: '{{ url('admin/product-list/delete') }}/' + productId,
                        method: "GET",
                        success: function(res) {
                            if (res.status === 'success') {
                                console.log(res);
                                alert('Product has been deleted!!');
                                window.location.reload();
                                sessionStorage.setItem('deleted', 'The product has been deleted!.');

                            }
                        },
                        error: function(error) {
                            console.log(error);

                        }

                    });
                }

            });
            //delete button end here
            //edit button 
            $('.edit-btn').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                console.log(productId);

                $.ajax({
                    url: '{{ url('admin/product-list/edit') }}/' + productId,
                    method: "GET",

                    success: function() {

                        window.location.href = '{{ url('admin/product-list/edit') }}/' + productId;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
    @endpush
@endsection
