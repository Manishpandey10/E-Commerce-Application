@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid py-2 mt-7">
                        <div class="row">
                            <div class="ms-3">
                                @include('components.global-message')
                                <h3 class="mb-0 h4 font-weight-bolder">Welcome to your
                                    Dashboard, <strong>{{ Auth::user()->username }}</strong></h3>
                                <h3 class="mb-0 h4 font-weight-bolder">Email Id : <strong>{{ Auth::user()->email }}</strong></h3>
                                <p class="mb-4 mt-4">
                                    Check the sales, value and bounce rate by country.
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi dolorum soluta maxime non
                                    quidem minus adipisci sapiente quaerat hic laboriosam quibusdam placeat, beatae iste
                                    labore numquam nam perspiciatis, recusandae enim!
                                </p>
                                <p class="mb-4">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur inventore possimus tempore id quis veritatis esse doloribus quisquam, ut alias, architecto blanditiis aspernatur provident voluptatem enim, natus doloremque quidem accusantium?
                                </p>

                            </div>



                        </div>
                    </div>
                @endsection
