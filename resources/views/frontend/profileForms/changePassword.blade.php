@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mb-6 mt-6 gy-6 justify-content-center">
        <div class="col-6">
            <div class="card">
                <span class="text-danger mt-4 mx-4 ">
                    @include('components.global-message')
                </span>

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Your Password</h5>
                </div>
                <div class="card-body">
                    <form id="formAuthentication" action="{{ route('updated-password') }}" class="mb-6" method="POST">
                        @csrf
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" id="cur_password" for="password">Current Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="cur_password" />
                                <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                            </div>
                            <span class="text-danger">
                                @error('cur_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="basic-default-email">New Password</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" class="form-control" aria-label="john.doe"
                                    aria-describedby="basic-default-email2" name="new_password" />
                                <br>
                            </div>
                            <span class="text-danger">
                                @error('new_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label form-password-toggle" for="basic-default-phone">Confirm New
                                Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="basic-default-phone" class="form-control phone-mask" name="password_confirmation" />
                                <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                            </div>

                            <span class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
            $(document).ready(function(){
               $('.form-password-toggle i').click(function(e){
                e.preventDefault();
                var formPasswordToggle = $(this).closest('.form-password-toggle');
                var formPasswordToggleIcon = formPasswordToggle.find('i');
                var formPasswordToggleInput = formPasswordToggle.find('input');
                if (formPasswordToggleInput.attr('type')==='text'){
                    formPasswordToggleInput.attr('type', 'password');
                    formPasswordToggleIcon.removeClass('bx-show').addClass('bx-hide');
                }
                else if (formPasswordToggleInput.attr('type')==='password'){
                     formPasswordToggleInput.attr('type', 'text');
                    formPasswordToggleIcon.removeClass('bx-hide').addClass('bx-show');
                }
               });


            });
            // var toggler = document.querySelectorAll('.form-password-toggle i');
            // if (typeof toggler !== 'undefined' && toggler !== null) {
            //     toggler.forEach(function(el) {
            //         el.addEventListener('click', function(e) {
            //             e.preventDefault();
            //             var formPasswordToggle = el.closest('.form-password-toggle');
            //             var formPasswordToggleIcon = formPasswordToggle.querySelector('i');
            //             var formPasswordToggleInput = formPasswordToggle.querySelector('input');
            //             if (formPasswordToggleInput.getAttribute('type') === 'text') {
            //                 formPasswordToggleInput.setAttribute('type', 'password');
            //                 formPasswordToggleIcon.classList.replace('bx-show', 'bx-hide');
            //             } else if (formPasswordToggleInput.getAttribute('type') === 'password') {
            //                 formPasswordToggleInput.setAttribute('type', 'text');
            //                 formPasswordToggleIcon.classList.replace('bx-hide', 'bx-show');
            //             }
            //         });
            //     });
            // }
        </script>
    @endpush
@endsection
