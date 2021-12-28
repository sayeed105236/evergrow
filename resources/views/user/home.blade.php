@extends('layouts.frontend-master')

@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Home</div>
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
      </ol>
    </nav>
  </div>

</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase" style="color:#08157A;"><strong>"Welcome Mr. {{Auth::user()->name}} to Evergrow"</strong></h6>
<hr/>

                    <!-- Medal Card -->
                    <!--/ Medal Card -->
                    @if(Session::has('Money_added'))
                  <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Success</h4>
                      <div class="alert-body">
                          {{Session::get('Money_added')}}
                      </div>
                  </div>
                  @elseif(Session::has('Money_Transfered'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success</h4>
                    <div class="alert-body">
                        {{Session::get('Money_Transfered')}}
                    </div>
                </div>
                  @endif
                  @if(session()->has('error'))

                   <h3 class="alert alert-danger" style="font-weight: 700;">
                       {{ session()->get('error') }}
                   </h3>

               @endif

                    <div class="row match-height row-cols-1 row-cols-md-2 row-cols-xl-4 ">




                      <div class="col">
                        <div class="card radius-10 bg-primary bg-gradient" style="height:130px;">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-white">Main Wallet</p>
                                <h4 class="my-1 text-white">{{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</h4>
                                <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addmoneyModal"><i class='bx bx-money'></i></a>
                                <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#transfermoneyModal"><i class='bx bx-send'></i></a>
                              </div>
                                @include('user.modals.add_moneymodal')
                                  @include('user.modals.transfer_moneymodal')
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col" >
                        <div class="card radius-10 bg-danger bg-gradient" style="height:130px;">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <?php
                                $earnings = App\Models\AddMoney::where('user_id',Auth::id())->where('method','Sponsor Bonus')->get()->sum('amount');
                                //dd($transferData);

                                 ?>
                                <p class="mb-0 text-white">Total Bonus</p>
                                <h4 class="my-1 text-white">{{isset($earnings) ? '$'.number_format((float)$earnings, 2, '.', '') : '$00.00'}}</h4>
                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-warning bg-gradient" style="height:130px;">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-dark">Total Withdraw</p>
                                <h4 class="text-dark my-1">$0.00</h4>
                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-success bg-gradient" style="height:130px;">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <?php
                                $transferData = App\Models\AddMoney::where('user_id',Auth::id())->where('type','Debit')->get()->sum('amount');
                                //dd($transferData);

                                 ?>
                                <p class="mb-0 text-white">Total Transfer</p>
                                <h4 class="my-1 text-white">${{abs($transferData)}}</h4>
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
                                $refferals = App\Models\User::where('sponsor',Auth::id())->get()->count('id');
                                //dd($refferals);

                                 ?>
                                <p class="mb-0 text-white">My Referrals</p>
                                <h4 class="my-1 text-white">{{$refferals}}</h4>

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
                                $total_sponsor_bonus = App\Models\AddMoney::where('user_id',Auth::id())->where('method','Sponsor Bonus')->get()->sum('amount');
                                //dd($total_level_bonus);

                                 ?>
                                <p class="mb-0 text-dark">Refer Bonus</p>
                                <h4 class="my-1 text-dark">${{$total_sponsor_bonus}}</h4>

                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-danger">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-white">Binary Bonus</p>
                                <h4 class="my-1 text-white">$0.00</h4>

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
                                <p class="mb-0 text-dark">Club Bonus</p>
                                <h4 class="my-1 text-dark">$0.00</h4>

                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-primary bg-gradient">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-white">Profit Share</p>
                                <h4 class="my-1 text-white">$0.00</h4>
                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-danger bg-gradient">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-white">Rank Bonus</p>
                                <h4 class="my-1 text-white">$0.00</h4>
                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-warning bg-gradient">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-dark">Total Unit</p>
                                <h4 class="text-dark my-1">0</h4>
                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card radius-10 bg-success bg-gradient">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-white">Unit Bonus</p>
                                <h4 class="my-1 text-white">$0.00</h4>
                              </div>
                              <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        </div>




                    <!-- Statistics Card -->

                    <!--/ Statistics Card -->



                <!-- Dashboard Ecommerce ends -->



    <!-- END: Content-->
    <script type="text/javascript">

      //alert('success');
      //console.log(this.getAttribute('id'));
      //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
    //var wallet=  document.getElementById("wallet_id");
    //wallet.innerHTML= id.value;
    document.getElementById('DestinationOptions').addEventListener('change', function(e) {
        var wallet2= e.target.options[e.target.selectedIndex].getAttribute('id');
        //console.log(wallet2);
        var wallet=  document.getElementById("wallet_id").value=wallet2;
        //console.log(wallet);
        //wallet.innerHTML= wallet2;
    });

    //  document.getElementById('').value(id.value);



    </script>
    <script type="text/javascript">

      //alert('success');
      //console.log(this.getAttribute('id'));
      //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
    //var wallet=  document.getElementById("wallet_id");
    //wallet.innerHTML= id.value;
    document.getElementById('DestinationOptions2').addEventListener('change', function(e) {
        var wallet3= e.target.options[e.target.selectedIndex].getAttribute('id');
        //console.log(wallet2);
        var wallet4=  document.getElementById("wallet_id").value=wallet3;
        //console.log(wallet);
        //wallet.innerHTML= wallet2;
    });

    //  document.getElementById('').value(id.value);



    </script>



@endsection
