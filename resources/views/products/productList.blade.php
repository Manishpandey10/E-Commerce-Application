@extends('frontend.layouts.main')
@section('main-container')
    <!-- Bordered Table -->
    <div class="card mx-4 mt-6">
        <div>
            <span class="mx-6 mb-2 text-success">
                @include('components.global-message')
            </span>
            <h5 class="card-header">Manage Products Listed </h5>
        </div>
        <div class="mx-6">
            <button type="button" class=" btn btn-light " id="edit" name="edit"><a href="{{ route('addProduct') }}"
                    class="link-primary">Add new Product </a>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Color Name</th>
                            <th>Product Description</th>
                            <th>Thumbnail</th>
                            <th>Theme</th>
                            <th>Product category</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productdata as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->productname }}</td>
                                @if ($data->color->status == 0)
                                  <td>
                                    <span class="text-danger">{{ $data->color->name }}</span>
                                  </td>
                                @else
                                  <td>
                                    <span class="text-success">{{ $data->color->name }}</span>
                                  </td>
                                @endif
                            
                                <td>{{ $data->productDescription }}</td>
                                {{-- product thumbnail --}}
                                <td><img src="{{ url('storage/' . $data->productthumbnail) }}" width="50px"
                                        height="50px">
                                </td>

                                @if ($data->theme->status == 0)
                                  <td>
                                    <span class="text-danger">{{ $data->theme->name }}</span>
                                  </td>
                                @else
                                  <td>
                                    <span class="text-success">{{ $data->theme->name }}</span>
                                  </td>
                                @endif
                                {{-- theme table data ends here --}}
                                @if ($data->category->productStatus == 0)
                                  <td>
                                    <span class="text-danger">{{ $data->category->categoryname }}</span>
                                  </td>
                                @else
                                  <td>
                                    <span class="text-success">{{ $data->category->categoryname }}</span>
                                  </td>
                                @endif
                                <td>{{ $data->created_at }}</td>

                                @if ($data->productStatus == '0')
                                    <td>
                                        <span class="text-danger text-dangers">Unlisted</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="text-success text-successs">Listed</span>
                                    </td>
                                @endif

                                <td><button type="button" class=" btn btn-light " id="edit" name="edit "><a
                                            href="{{ route('product.list.edit', $data->id) }}"
                                            class="link-primary">Edit</a></button>&nbsp;&nbsp;
                                    <button type="button" class=" btn btn-light " id="delete" name="delete"
                                        onclick="return confirm('are your sure you want to delete this product ?')"><a
                                            class="link-primary"
                                            href="{{ route('product.list.delete', $data->id) }}">Delete</a></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
@endsection
