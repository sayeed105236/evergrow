@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Profile</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">User Profile</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    @if(Session::has('profile_updated'))
  <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Success</h4>
      <div class="alert-body">
          {{Session::get('profile_updated')}}
      </div>
  </div>
  @endif
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="{{asset('storage/User/'.Auth::user()->image)}}" alt="Admin" height="110" width="110" class="rounded-circle p-1 bg-primary" >
                  <div class="mt-3">
                    <h4>{{Auth::user()->name}}</h4>
                    <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                    <p class="text-muted font-size-sm">{{Auth::user()->number}}</p>
                    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#editprofilemodal">Edit Profile</a>
                    <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</a>


                  </div>
                  @include('user.modals.profile_updatemodal')

                </div>
                <hr class="my-4" />

              </div>

            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->name}}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">User Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->user_name}}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->email}}" />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->number}}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">National ID</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->national_id}}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Date Of Birth</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->birth}}" />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->address}}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Gender</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->gender}}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nominee Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->nominee}}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nominee Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="{{Auth::user()->nominee_email}}" />
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @include('user.modals.change_password')



@endsection
