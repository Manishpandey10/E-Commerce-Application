@extends('frontend.layouts.main')

@section('main-container')
    <div class="card mx-4 mt-6">
        <div>
            <span id="alert_msg" class="mx-6 mb-2 text-success">
                {{-- @include('components.global-message') --}}
            </span>
            <h5 class="card-header">Manage Products Listed </h5>
        </div>
        <div class="mx-6">
            <div class="card-body">
                <div class="table-responsive text-nowrap mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Sent At</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->created_at }}</td>



                                    <td>
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
                    const deletedMsg = sessionStorage.getItem('messageDeleted');

                    $("#alert_msg").html('');
                    if (deletedMsg) {   
                        $("#alert_msg").html(
                            `<div class="alert alert-danger alert-dismissible" role="alert">${deletedMsg} </div>`
                        );
                    }
                    setTimeout(function() {
                        $("#alert_msg").fadeOut();
                        sessionStorage.clear();

                    }, 2500);

                    //deleted functionality 
                    $('.dlt-btn').on('click', function(e) {
                        e.preventDefault();
                        let productId = $(this).data('id');
                        console.log(productId);


                        if (confirm('are your sure you want to delete this product ?')) {
                            $.ajax({
                                url: '{{ url('admin/manage-messages/delete') }}/' + productId,
                                method: "GET",
                                success: function(res) {
                                    if (res.status === 'success') {
                                        console.log(res);
                                        alert('Product has been deleted!!');
                                        sessionStorage.setItem('messageDeleted', res.messageDeleted);
                                        window.location.reload();
                                    }
                                },
                                error: function(error) {
                                    console.log(error);

                                }

                            });
                        }

                    });
                });
            </script>
        @endpush
    @endsection
