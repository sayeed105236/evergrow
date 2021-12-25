@extends('layouts.frontend-master')

@section('content')







                <!-- Dashboard Ecommerce Starts -->



                    <!-- Medal Card -->
                    <!--/ Medal Card -->


                    <div class="row match-height row-cols-1 row-cols-md-2 row-cols-xl-4 ">



                      <div class="col">
                        <div class="card radius-10 bg-primary bg-gradient" style="height:130px;">
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <p class="mb-0 text-white">Main Wallet</p>
                                <h4 class="my-1 text-white">$0.00</h4>
                                <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addmoneyModal"><i class='bx bx-money'></i></a>
                                <a class="btn btn-danger" href="#"><i class='bx bx-send'></i></a>
                              </div>
                                @include('user.modals.add_moneymodal')
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
                                <p class="mb-0 text-white">Total Bonus</p>
                                <h4 class="my-1 text-white">$0.00</h4>
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
                                <p class="mb-0 text-white">Total Transfer</p>
                                <h4 class="my-1 text-white">$0.00</h4>
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
                                <p class="mb-0 text-white">My Referrals</p>
                                <h4 class="my-1 text-white">0</h4>

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
                                <p class="mb-0 text-dark">Refer Bonus</p>
                                <h4 class="my-1 text-dark">$0.00</h4>

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



@endsection
