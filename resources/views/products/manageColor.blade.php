@extends('frontend.layouts.main')

@section('main-container')
<div class="card mx-4 mt-6">
                <div>
                  <span id="alert_msg" class="mx-6 mb-2 text-success">
                    {{-- @include('components.global-message') --}}
                  </span>
                  <h5 class="card-header">Manage Products Listed </h5>
                </div>
                <div class="mx-6">
                  <button type="button" class=" btn btn-light " id="edit" name="edit"><a
                              href="{{ route('addNewColor') }}" class="link-primary">Add new Color </a>
                  </button>
                  </div>
                <div class="card-body">
                  <div class="table-responsive text-nowrap mt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Color Name</th>
                          <th>Thumbnail</th>
                          <th>Created At</th>
                          <th>Status</th>
                          <th>actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($color as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td><img src="{{ url('storage/'.$data->thumbnail) }}" width="50px" height="50px"></td>
                                <td>{{$data->created_at}}</td>
                              
                                  @if ($data->status == '0')
                                      <td>
                                          <span class="text-danger text-dangers">Unlisted</span>
                                      </td>
                                  @else
                                      <td>
                                          <span class="text-success text-successs">Listed</span>
                                      </td>
                                  @endif
                              
                                <td><button type="button" class=" btn btn-primary edit-btn" data-id="{{ $data->id }}"
                                        name="edit ">Edit</button>&nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary dlt-btn"
                                        data-id="{{ $data->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@push('scripts')
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script>
            $(document).ready(function() {
                const deletedMsg = sessionStorage.getItem('colorDeleted');
                const updateMsg = sessionStorage.getItem('colorEdit');
                $("#alert_msg").html('');
                if (deletedMsg) {
                    $("#alert_msg").html(
                        `<div class="alert alert-success alert-dismissible" role="alert">${deletedMsg} </div>`);
                        
                } else if (updateMsg) {
                    $("#alert_msg").html(
                        `<div class="alert alert-success alert-dismissible" role="alert">${updateMsg} </div>`);
                         sessionStorage.clear();   
                } else {
                    $("#alert_msg").hide();
                }
                setTimeout(function() {
                    $("#alert_msg").fadeOut();
                    sessionStorage.clear();
                }, 2000);
                //deleted functionality 
                  $('.dlt-btn').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                console.log(productId);


                if (confirm('are your sure you want to delete this product ?')) {
                    $.ajax({
                        url: '{{ url('admin/add-new-color/delete') }}/' + productId,
                        method: "GET",
                        success: function(res) {
                            if (res.status === 'success') {
                                console.log(res);
                                alert('Product has been deleted!!');
                                sessionStorage.setItem('colorDeleted', res.colorDeleted);
                                window.location.reload();
                            }
                        },
                        error: function(error) {
                            console.log(error);

                        }

                    });
                }

            });
            //accessing the color edit page
              $('.edit-btn').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');
                console.log(productId);

                $.ajax({
                    url: '{{ url('admin/add-new-color/edit') }}/' + productId,
                    method: "GET",

                    success: function() {

                        window.location.href = '{{ url('admin/add-new-color/edit') }}/' + productId;
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