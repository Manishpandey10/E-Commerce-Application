@extends('frontend.layouts.main')
@section('main-container')
    <!-- Bordered Table -->
    <div class="card mx-4 mt-6">
        <span id="alert_msg" class="text-success mt-6 mb-4 ">

        </span>
        <h5 class="card-header">Manage Product Category </h5>
        <div class="mx-6">
            <button type="button" class=" btn btn-light " id="edit" name="edit"><a href="{{ route('addnewcategory') }}"
                    class="link-primary">Add new Product category</a></button>
        </div>
        <div class="card-body">

            <div class="table-responsive text-nowrap mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Thumbnail</th>
                            <th>Registered At</th>
                            <th>Status</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorydata as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->categoryname }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $data->thumbnail) }}" width="50px" height="50px">
                                </td>
                                <td>{{ $data->created_at }}</td>
                                @if ($data->productStatus == '0')
                                    <td>
                                        <span class="text-danger text-dangers">Unlisted</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="text-success text-success">Listed</span>
                                    </td>
                                @endif
                                {{-- <td>{{$data->productStatus}}</td> --}}
                                <td><button type="button" class=" btn btn-light " id="edit" name="edit "><a
                                            href="{{ route('edit.product', $data->id) }}"
                                            class="link-primary">Edit</a></button>&nbsp;&nbsp;
                                    <button type="button" class=" btn btn-light " id="delete" name="delete"
                                        onclick="return confirm('are your sure you want to delete this product category ?')"><a
                                            class="link-primary"
                                            href="{{ route('delete.product', $data->id) }}">Delete</a></button>
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
                const value = sessionStorage.getItem('productAdded');
                $("#alert_msg").html(`<div class="alert alert-success alert-dismissible" role="alert">${value} </div>`);
                sessionStorage.removeItem('productAdded');
                setTimeout(function(){
                    $("#alert_msg").hide();
                },2000);

            });
        </script>
    @endpush
@endsection
