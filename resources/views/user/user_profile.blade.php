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
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="{{asset('assets/images/avatars/avatar-2.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                  <div class="mt-3">
                    <h4>{{Auth::user()->name}}</h4>
                    <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                    <p class="text-muted font-size-sm">{{Auth::user()->number}}</p>
                    <a class="btn btn-primary" href="#">Edit Profile</a>

                  </div>
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
                    <h6 class="mb-0">Date Of Birth</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="12-12-2000" />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="Bay Area, San Francisco, CA" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Gender</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="Bay Area, San Francisco, CA" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nominee Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="Bay Area, San Francisco, CA" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Nominee Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" disabled class="form-control" value="Bay Area, San Francisco, CA" />
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>



@endsection
