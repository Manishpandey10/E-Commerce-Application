@extends('frontend.layouts.main')


@section('main-container')
<div class="row mx-4 mt-6 justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">Edit the color</h5>
                </div>
                <div class="card-body">

                    <form id="formAuthentication" class="mb-6" method="POST"
                        action="{{ route('update.addNewTheme', $theme->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-6 mb-4">
                                <label for="username" class="form-label">Enter Theme Name</label>
                                <input type="text" class="form-control"  name="name"
                                    placeholder="Enter name of product" autofocus value="{{ $theme->name }}" />
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-6 mb-6">
                                <label class="form-file" for="basic-default-message">Upload Thumbnail</label>
                                <input type="file" accept="image/jpeg, image/jpg, image/png" name="themethumbnail"
                                    id="basic-default-message" class="form-control"></input>
                                <small id="emailHelp" class="form-text text-muted">Supported file formats = .JPG,.PNG,
                                    .JPEG</small>
                                <span class="text-danger">
                                    @error('themethumbnail')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="category" class="form-label">Status</label>

                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected>Status </option>
                                    <option value="1" {{ $theme->status == '1' ? 'selected' : '' }}>
                                        Listed</option>
                                    <option value="0" {{ $theme->status == '0' ? 'selected' : '' }}>
                                        Unlisted</option>
                                </select>

                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="my-7">
                                <button class="btn btn-primary d-grid btn-md">Update Theme</button>

                            </div>



                    </form>

    </div>
@endsection