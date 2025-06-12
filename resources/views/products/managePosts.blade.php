@extends('frontend.layouts.main')
@section('main-container')
        <div class="card mx-4 mt-6">
        <div>
            <span id="alert_msg" class="mx-6 mb-2 text-success">
                @include('components.global-message')
            </span>
            <h5 class="card-header">Manage Posts </h5>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Post Title</th>
                            <th>Picture</th>
                            {{-- <th>Description</th> --}}
                            <th>Created At</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postData as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->post_title }}</td>
                                <td><img src="{{ url('storage/' . $data->picture) }}" width="50px" height="50px"></td>
                                {{-- <td>{{ $data->description }}</td> --}}
                                <td>{{ $data->created_at }}</td>


                                <td>
                                    <button type="button" onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-light dlt-btn"><a href="{{ route('delete.post', $data->id) }}">Delete</a></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection