@extends('frontend.layouts.main')

@section('main-container')
    <div class="card mx-4 mt-6">
        <div>
            <span class="mx-6 mb-2 text-success">
                @include('components.global-message')
            </span>
            <h5 class="card-header">Manage Themes Listed </h5>
        </div>
        <div class="mx-6">
            <button type="button" class=" btn btn-light " id="edit" name="edit"><a href="{{ route('addNewTheme') }}"
                    class="link-primary">Add new Theme </a>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Theme Name</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($theme as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td><img src="{{ url('storage/' . $data->thumbnail) }}" width="50px" height="50px"></td>
                                <td>{{ $data->created_at }}</td>
                                @if ($data->status == '0')
                                    <td>
                                        <span class="text-danger text-dangers">Unlisted</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="text-success text-successs">Listed</span>
                                    </td>
                                @endif
                             
                                <td><button type="button" class=" btn btn-light " id="edit" name="edit "><a
                                            href="{{ route('addNewTheme.edit', $data->id) }}" class="link-primary">Edit</a></button>&nbsp;&nbsp;
                                    <button type="button" class=" btn btn-light " id="delete" name="delete"
                                        onclick="return confirm('are your sure you want to delete this Theme ?')"><a
                                            class="link-primary" href="{{ route('delete.NewTheme',$data->id) }}"> Delete</a></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
