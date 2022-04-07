@extends('layouts.admin-master')

@section('content')


<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
            </ol>
        </nav>
    </div>

</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase" style="color:#08157A;"><strong>"Welcome Mr. {{Auth::user()->name}} to
        Evergrow"</strong></h6>
        <hr>



<!-- Medal Card -->
<!--/ Medal Card -->


<div class="row match-height row-cols-1 row-cols-md-2 row-cols-xl-4 ">





    <div class="col">
        <div class="card radius-10 bg-danger">
            <div class="card-body">
              <div class="d-flex align-items-center">
                  <div>
                      <?php
                      $deposit = App\Models\AddMoney::where('method','Deposit')->where('status', 'approve')->get()->sum('amount');
                      //dd($transferData);

                      ?>
                      <p class="mb-0 text-dark">Total Deposit</p>
                      <h4 class="text-dark my-1">${{abs($deposit)}}</h4>
                  </div>
                  <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-warning">
            <div class="card-body">
              <div class="d-flex align-items-center">
                  <div>
                      <?php
                      $withdraw = App\Models\Withdraw::where('status', 'approve')->get()->sum('amount');
                      //dd($transferData);

                      ?>
                      <p class="mb-0 text-white">Total Withdraw</p>
                      <h4 class="my-1 text-white">${{abs($withdraw)}}</h4>
                  </div>
                  <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <?php
                        $users = App\Models\User::all()->count('id');
                        //dd($refferals);

                        ?>
                        <p class="mb-0 text-white">Total Users</p>
                        <h4 class="my-1 text-white">{{$users}}</h4>

                    </div>
                    <div class="widgets-icons bg-white text-dark ms-auto"><i class="bx bxs-group"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <?php
                        $total_active_users = App\Models\User::where('activation_status', 1)->get()->count();
                        //dd($total_level_bonus);

                        ?>
                        <p class="mb-0 text-dark">Total Active Users</p>
                        <h4 class="my-1 text-dark">${{$total_active_users}}</h4>

                    </div>
                    <div class="text-white ms-auto font-35"><i class='bx bx-users'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <h3>Master Password: <span style="color:red;">mySecretMasterPass</span> </h3>
  <h4>Cron JOB: * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1</h4>



@endsection
