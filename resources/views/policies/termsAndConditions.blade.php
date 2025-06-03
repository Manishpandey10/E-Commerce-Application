@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <span class="text-success mx-6 mt-4">
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
                    <form action="{{ route('updateTerms-and-condition') }}" method="POST">
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
            @endsection
