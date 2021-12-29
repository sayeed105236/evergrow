@extends('layouts.frontend-master')

@section('content')
<style type="text/css">
      .green_tree * {
          color: #008911 !important;
          font-size: 12px
      }

      .red_tree * {
          color: #ff363b !important;
          font-size: 12px
      }

      .popover .arrow {
          display: none !important
      }

      .popover-body {
          color: #0c4b85 !important;
      }

      .popover-body span {
          font-weight: 400;
          color: #0070d7
      }

      .popover-header {
          background-color: #1d72f3 !important;
          color: #fff !important;
          border-radius: 0px !important;
          font-weight: bold;
          text-align: center
      }

      .tree-table * {
          text-align: center !important;
      }

      .tree img {
          max-width: 60px !important;
          height: auto
      }

      .tree.table thead tr th, .table tbody tr td {
          border: 0
      }

      .tree .line {
          width: 100%;
          max-width: 50% !important;
      }

      .tree-table {
          width: 100%;
          min-width: 800px
      }

      .card i {
          color: rgba(235, 177, 0, 0.95);
          font-weight: bold;
          font-size: 16px
      }
  </style>


    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">My Team</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">My Team</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">My Team</h6>
      </div>

    </div>


    <hr/>

    <div class="content-body">
                   <!-- Content start -->
                   <div class="tree">
                       <div class="table-responsive">
                           <table class="border-0 tree-table">
                               <tr>
                                   <td colspan="8">
                                       <a class="text-center green_tree" href="299" data-toggle="popover" title=""
                                          data-content="<span>Name:</span> Company User<br/><span>Sponsor:</span> ><span>Registration Date:</span> 2020-09-07<br/><span>Package:</span> sahilkajle<br/><span>Own Investment:</span> ₹ 36951.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                          data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                      src="https://downassam.com/demo/public/images/green_user.png"
                                                                                      alt="Company User"><br/><strong> john</strong><br/><span
                                               class="text-sm-center"></span></a><br/>
                                       <img class="img-fluid line" src="https://downassam.com/demo/public/images/line.png"
                                            alt="">
                                   </td>
                               </tr>

                                                                   <tr>
                                                                               <td colspan="4">
                                               <a class="text-center green_tree"
                                                  href="300"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="https://downassam.com/demo/public/images/red_user.png"
                                                                                              alt="Mohammed Saleem"><br/><strong>
                                                       User 1
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img class="img-fluid line"
                                                    src="https://downassam.com/demo/public/images/line.png" alt="">
                                           </td>

                                                                               <td colspan="4">
                                               <a class="text-center green_tree"
                                                  href="301"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="https://downassam.com/demo/public/images/red_user.png"
                                                                                              alt="Mohammed Saleem"><br/><strong>
                                                       User 2
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img class="img-fluid line"
                                                    src="https://downassam.com/demo/public/images/line.png" alt="">
                                           </td>

                                   </tr>
                                   <tr>
                                                                               <td colspan="2">
                                               <a class="text-center green_tree"
                                                  href="302"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="https://downassam.com/demo/public/images/red_user.png"
                                                                                              alt="Mohammed Saleem"><br/><strong>
                                                       User 3
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img class="img-fluid line"
                                                    src="https://downassam.com/demo/public/images/line.png" alt="">
                                           </td>


                                           <td colspan="2">
                                               <a class="text-center green_tree"
                                                  href="304"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="https://downassam.com/demo/public/images/red_user.png"
                                                                                              alt="Mohammed Saleem"><br/><strong>
                                                       User 4
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                               <img class="img-fluid line"
                                                    src="https://downassam.com/demo/public/images/line.png" alt="">
                                           </td>

                                       <!--- Lev two Right -->
                                                                                       <td colspan="2">
                                                   <a class="text-center green_tree"
                                                      href="305"
                                                      data-toggle="popover" title=""
                                                      data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                      data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                                  src="https://downassam.com/demo/public/images/red_user.png"
                                                                                                  alt="Mohammed Saleem"><br/><strong>
                                                           User 5
                                                       </strong><br/><span class="text-sm-center"> </span></a><br/>
                                                   <img class="img-fluid line"
                                                        src="https://downassam.com/demo/public/images/line.png" alt="">
                                               </td>

                                                                                       <td colspan="4">
                                                   <a class="text-center green_tree"
                                                      href="303"
                                                      data-toggle="popover" title=""
                                                      data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                      data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                                  src="https://downassam.com/demo/public/images/red_user.png"
                                                                                                  alt="Mohammed Saleem"><br/><strong>
                                                           User 6
                                                       </strong><br/><span class="text-sm-center"> </span></a><br/>
                                                   <img class="img-fluid line"
                                                        src="https://downassam.com/demo/public/images/line.png" alt="">
                                               </td>

                                   </tr>

                                   <tr>
                                       <!--left-->
                                                                               <td>
                                               <a class="text-center green_tree"
                                                  href="307" data-toggle="popover" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true"> <img class="rounded-circle" src="https://downassam.com/demo/public/images/red_user.png" alt="YUSUFF"><br />
                                                   <strong>  User 7</strong><br /><span class="text-sm-center"> </span ></a> </td>

                                                                               <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 9"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                           </td>

                                                                               <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 9"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                           </td>
                                                                                                                   <td>
                                               <a class="text-center green_tree" href="308" data-toggle="popover" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true"> <img class="rounded-circle" src="https://downassam.com/demo/public/images/red_user.png" alt="YUSUFF"><br />
                                                   <strong> User 11</strong><br /><span class="text-sm-center"> </span ></a>
                                           </td>

                                   <!--right-->
                                                                               <td>
                                               <a class="text-center green_tree"
                                                  href="316"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="https://downassam.com/demo/public/images/red_user.png"
                                                                                              alt="Mohammed Saleem"><br/><strong>
                                                       User 8
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                           </td>

                                                                               <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 5"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                           </td>

                                                                               <td>
                                               <a target="_blank" href="#" data-toggle="tooltip" title="Click to register below: 5"><img src="https://downassam.com/demo/public/images/new_user.png" alt="New User"></a>
                                           </td>
                                                                                                                   <td>
                                               <a class="text-center green_tree"
                                                  href=" 306"
                                                  data-toggle="popover" title=""
                                                  data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                  data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                              src="https://downassam.com/demo/public/images/red_user.png"
                                                                                              alt="Mohammed Saleem"><br/><strong>
                                                       User 9
                                                   </strong><br/><span class="text-sm-center"> </span></a><br/>
                                           </td>
                                                                       </tr>
                           </table>
                       </div>


                   </div>


                   <!-- Content End -->


               </div>
           </div>
       <!-- END: Content-->




@endsection
