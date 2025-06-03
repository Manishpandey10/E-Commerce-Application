@extends('frontend.layouts.main')
@section('main-container')
              <!-- Bordered Table -->
              <div class="card mx-4 mt-6">
                <h5 class="card-header">Personal Customer</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Customer name</th>
                          <th>email</th>
                          <th>Phone</th>
                          <th>Registered At</th>
                          <th>Status</th>
                          <th>actions</th>
                          <th>Business Profile request</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
@endsection