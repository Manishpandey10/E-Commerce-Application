@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mb-12 mt-7 g-6 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <img class="card-img-top" src="{{ url('storage/'.Auth::user()->profileimage) }}" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">User Name :{{Auth::user()->username}}</h5>
                    <hr>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Go To Dashboard</a>

                    <a href="{{ route('update-profile') }}" class="btn btn-outline-primary">Update Your Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection
