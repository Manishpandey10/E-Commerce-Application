@extends('frontend.layouts.main')
@section('main-container')
    <div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                
                <span class=" mx-6 mt-4 text-success">
                    @include('components.global-message')
                </span>
                <div class="card-header mt-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Exchange and Return Policy</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mx-2 my-2">
                        <form action="{{ route('updateExchange-policy',$data->id) }}" method="POST">
                            @csrf
                            <label for="exampleFormControlTextarea1">Exchange and Return Policy</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="exchange_policy" rows="3">{{$data->exchange_policy}}</textarea>
                            <div class="mb-6 mt-6">
                                <button class=" btn btn-primary d-grid  btn-md" onclick="{{ route('updateExchange-policy') }}" type="submit">Update Exchnage policy</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
