@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">

                <span id="alert_msg" class=" mx-6 mt-4 text-success">
                    @include('components.global-message')
                </span>
                <div class="card-header mt-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Exchange and Return Policy</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mx-2 my-2">
                        <form id="updateForm" data-id={{ $data->id }}>
                            @csrf
                            <label for="exampleFormControlTextarea1">Exchange and Return Policy</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="exchange_policy" rows="3">{{ $data->exchange_policy }}</textarea>
                            <div class="mb-6 mt-6">
                                <button class=" btn btn-primary d-grid  btn-md" type="submit">Update Exchnage
                                    policy</button>
                            </div>
                        </form>
                    </div>
                </div>
                @push('scripts')
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $("#updateForm").on('submit', function(e) {
                                e.preventDefault();
                                let formData = new FormData(this);
                                let productId = $(this).data('id');

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: '{{ url('admin/update-exchange-policy') }}/' + productId,
                                    method: "POST",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(res) {
                                        console.log(res);
                                        let alert_msg = res.updateExchangePolicy;
                                        $('#alert_msg').html(
                                            `<div class="alert alert-success alert-dismissible" role="alert">${alert_msg} </div>`
                                        );
                                        setTimeout(function() {
                                            $('#alert_msg').html('');
                                            window.location.reload()
                                        }, 1500);

                                        alert('some chnges in the policy has been made!!');
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
