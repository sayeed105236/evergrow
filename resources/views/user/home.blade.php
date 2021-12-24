@extends('layouts.frontend-master')

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">



                <!-- Dashboard Ecommerce Starts -->

                <section id="dashboard-ecommerce">
                    <h4>"Welcome Mr. {{ Auth::user()->name }} to Evergrow"</h4>

                    <!-- Medal Card -->
                    <!--/ Medal Card -->
                    <div class="row match-height">
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Main Wallet</h4>


                                    <h2 class="card-text"><strong>$00.00</strong></h2>

                                    </h4>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Total Bonus</h4>


                                      <h2 class="card-text"><strong>$00.00</strong></h2>

                                    </h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Total Withdraw</h4>


                                    <h2 class="card-text"><strong>$00.00</strong></h2>

                                    </h4>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Total Transfer</h4>


                                      <h2 class="card-text"><strong>$00.00</strong></h2>

                                    </h4>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">

                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h4 class="card-title text-white">My Referrals</h4>
                                    <h2 class="card-text">
                                        <strong>$0.00</strong>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Refer Bonus</h4>
                                    <h2 class="card-text"><strong>$0.00</strong></h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h4 class="card-title text-white">Binary Bonus</h4>

                                    <h2 class="card-text"><strong>$00.00</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Club Bonus</h4>
                                    <h2 class="card-text"><strong>$00.00</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Profit Share</h4>
                                    <h2 class="card-text"><strong>$00.00</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Rank Bonus</h4>
                                    <h2 class="card-text"><strong>$00.00</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">

                                    <h4 class="card-title text-white">Total Unit</h4>
                                    <h2 class="card-text"><strong>$00.00</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <h4 class="card-title text-white">Unit Bonus</h4>
                                    <h2 class="card-text"><strong>$00.00</strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Card -->

                    <!--/ Statistics Card -->


                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->



@endsection
