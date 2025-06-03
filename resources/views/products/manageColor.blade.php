@extends('frontend.layouts.main')

@section('main-container')
<div class="card mx-4 mt-6">
                <div>
                  <span class="mx-6 mb-2 text-success">
                    @include('components.global-message')
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
                              
                                <td><button type="button" class=" btn btn-light " id="edit" name="edit "><a href="{{ route('addNewColor.edit',$data->id) }}" class="link-primary">Edit</a></button>&nbsp;&nbsp;
                                   <button type="button" class=" btn btn-light " id="delete" name="delete" onclick="return confirm('are your sure you want to delete this Color ?')"><a class="link-primary" href="{{ route('delete.NewColor', $data->id) }}"> Delete</a></button></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection