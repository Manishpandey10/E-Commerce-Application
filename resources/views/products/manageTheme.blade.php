@extends('frontend.layouts.main')

@section('main-container')
    <div class="card mx-4 mt-6">
        <div>
            <span id="alert_msg" class="mx-6 mb-2 text-success">
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
@push('scripts')
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script>
            $(document).ready(function() {
                
                const added = sessionStorage.getItem('ThemeSuccess');
                const deletedMsg = sessionStorage.getItem('ThemeDeleted');
                const updateMsg = sessionStorage.getItem('updateTheme');
                // $("#alert_msg").html('');
                if (deletedMsg) {
                    $("#alert_msg").html(
                        `<div class="alert alert-danger alert-dismissible" role="alert">${deletedMsg} </div>`);
                        
                } else if (added) {
                    $("#alert_msg").html(
                        `<div class="alert alert-success alert-dismissible" role="alert">${added} </div>`);
                        //  sessionStorage.clear();   
                
                } else if (updateMsg) {
                    $("#alert_msg").html(
                        `<div class="alert alert-success alert-dismissible" role="alert">${updateMsg} </div>`);
                        //  sessionStorage.clear();   
                } else {
                    $("#alert_msg").hide();
                }
                setTimeout(function() {
                    $("#alert_msg").fadeOut();
                    sessionStorage.clear();
                }, 2000);
                //deleted functionality 
                  $('.dlt-btn').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                console.log(productId);


                if (confirm('are your sure you want to delete this product ?')) {
                    $.ajax({
                        url: '{{ url('admin/add-new-theme/delete') }}/' + productId,
                        method: "GET",
                        success: function(res) {
                            if (res.status === 'success') {
                                console.log(res);
                                alert('Product has been deleted!!');
                                sessionStorage.setItem('ThemeDeleted', res.ThemeDeleted);
                                window.location.reload();
                            }
                        },
                        error: function(error) {
                            console.log(error);

                        }

                    });
                }

            });
            //accessing the color edit page
              $('.edit-btn').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                console.log(productId);

                $.ajax({
                    url: '{{ url('admin/add-new-theme/edit') }}/' + productId,
                    method: "GET",

                    success: function() {

                        window.location.href = '{{ url('admin/add-new-theme/edit') }}/' + productId;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            });
          </script>
@endpush     
@endsection
