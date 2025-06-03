@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <span class="text-success mx-6 mt-4">
                    @include('components.global-message')
                </span>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Privacy Policy</h5>
                </div>
                <div class="card-body">
                    {{-- {{dd($data->privacyPolicy);}} --}}
                    <form action="{{ route('updatePrivacy-policy',$data->id) }}" method="POST">
                        @csrf

                        <div class="form-group mx-2 my-2">
                            <label for="exampleFormControlTextarea1">Privacy Policy</label>
                            <textarea class="form-control" name="privacypolicy" id="exampleFormControlTextarea1" rows="3">{{$data->privacyPolicy}}</textarea>
                            <div class="mb-6 mt-6">
                                <button class=" btn btn-primary d-grid  btn-md" type="submit">Update Privacy Policy</button>
                            </div>
                        </div>
                    </form>    
                </div>
            @endsection
