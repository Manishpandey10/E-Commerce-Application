@extends('frontend.layouts.main')
@section('main-container')
    <!-- Bordered Table -->
    <div class="card mx-4 mt-6">
        <h5 class="card-header">Personal Customer</h5>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Customer name</th>
                            <th>email</th>
                            <th>Phone</th>
                            <th>Registered At</th>
                            <th>Role</th>
                            {{-- <th>actions</th> --}}
                            {{-- <th>Business Profile request</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->created_at }}</td>
                                @if ($user->role_id == 2)
                                    <td>
                                        <span class="text-danger text-dangers">User</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="text-success text-success">Admin</span>
                                    </td>
                                @endif
                                 {{-- <td><button type="button" class=" btn btn-primary edit-btn" data-id="{{ $user->id }}"
                                        name="edit ">Edit</button>&nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary dlt-btn"
                                        data-id="{{ $user->id }}">Delete</button>
                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
@endsection
