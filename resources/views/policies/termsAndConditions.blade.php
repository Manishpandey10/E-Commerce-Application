@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <span id="alert_msg" class="text-success mx-6 mt-4">
                    @include('components.global-message')
                </span>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 mx-2">Update Terms And Conditions</h5>
                    {{-- <span class=" mt-2 mb-2 text-danger">
                                @error('terms_condition')
                                    {{ $message }}
                                @enderror
                    </span> --}}
                     
                </div>
                <div class="card-body">
                    {{-- {{ dd($data->id); }} --}}
                    <form id="updateForm">
                        @csrf
                        <div class="form-group mx-2 my-2">
                            <label for="exampleFormControlTextarea1">Terms and conditions</label>
                            <textarea class="form-control" name="terms_condition" id="exampleFormControlTextarea1" rows="3">{{
                                $data->terms_condition}}</textarea>
                            <div class="mb-6 mt-6">
                            
                                <button class=" btn btn-primary d-grid  btn-md" type="submit">Update Terms and Conditions</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                @push('scripts')
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $("#updateForm").on('submit', function(e) {
                                e.preventDefault();
                                let formData = new FormData(this);
                                // let productId = $(this).data('id');

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: '{{ url('admin/terms-condition ') }}',
                                    method: "POST",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(res) {
                                        console.log(res);
                                        let alert_msg = res.termSuccess;
                                        $('#alert_msg').html(
                                            `<div class="alert alert-success alert-dismissible" role="alert">${alert_msg} </div>`
                                        );
                                        setTimeout(function() {
                                            $('#alert_msg').html('');
                                            window.location.reload()
                                        }, 2500);

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
