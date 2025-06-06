@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mb-6 mt-6 gy-6 justify-content-center">
        <div class="col-6">
            <div class="card ">
                <span id="alert_msg" class="mx-6 mt-3 mb-0 text-success">
                    {{-- @include('components.global-message') --}}
                </span>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Your Profile</h5>
                </div>
                <div class="card-body">
                    <form id="updateForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label class="form-label" for="basic-default-fullname">Full Name</label>
                            <input type="text" class="form-control" name="username" id="basic-default-fullname"
                                value="{{ Auth::user()->username }}" />
                            <span id="username_error" class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-6">
                            <label class="form-label" for="basic-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" class="form-control" aria-label="john.doe"
                                    aria-describedby="basic-default-email2" name="email"
                                    value="{{ Auth::user()->email }}" />
                            </div>
                            <span id="email_error" class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="basic-default-phone">Phone No</label>
                            <input type="tel" id="basic-default-phone" name="phone" class="form-control phone-mask"
                                value="{{ Auth::user()->phone }}" />
                            <span id="phone_error" class="text-danger">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-6">
                            <label class="form-file" for="basic-default-message">Update profile Picture</label>
                            <input type="file" name="profileimage" id="basic-default-message"
                                class="form-control"></input>
                            <span id="form_error" class="text-danger">
                                @error('profileimage')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            <a class="mx-6" id="changePass" href="">
                                <span>Change password </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        {{-- button working using ajax --}}
        <script>
            $(document).ready(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#updateForm').on('submit', function(e) {
                                e.preventDefault();

                                const formData = new FormData(this);
                                $.ajax({
                                        url: "{{ route('updated-profile') }}",
                                        method: "POST",
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        success: function(res) {
                                            if (res.status === 'success') {
                                                console.log(res);
                                                let alert_msg = res.updateMsg;
                                                console.log(alert_msg);


                                                $('#alert_msg').html(
                                                    `<div class="alert alert-success alert-dismissible" role="alert">${alert_msg} </div>`
                                                )
                                                setTimeout(function(){
                                                        $('#alert_msg').html('');
                                                        window.location.href = "http://127.0.0.1:8000/admin/update-profile";
                                                        // window.location.reload();
                                                }, 2000);
                                            

                                                }

                                            },
                                            error: function(error) {
                                                console.log(error);
                                                const formError = error.responseJSON.errors;
                                                console.log(formError);
                                                $('.text-danger').html('');
                                                if ($('#username_error')) {
                                                    $('#username_error').html(formError.username[0]);
                                                }
                                                if ($('#email_error')) {
                                                    $('#email_error').html(formError.email[0]);

                                                }
                                                if ($('#phone_error')) {
                                                    $('#phone_error').html(formError.phone[0]);
                                                }
                                            }

                                        });
                                });



                            $("#changePass").mouseover(function() {
                                $("#changePass").attr('href', 'http://127.0.0.1:8000/admin/change-password');
                            });
                        });
        </script>
    @endpush
@endsection
