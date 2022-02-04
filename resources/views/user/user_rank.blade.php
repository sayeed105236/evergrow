@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">My Rank</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">My Rank</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">My Rank</h6>
      </div>

    </div>


    <hr/>
    @if(Session::has('silver_claimed'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success</h4>
            <div class="alert-body">
                {{Session::get('silver_claimed')}}
            </div>
        </div>
        @endif

    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>SL</th>
                <th>Left Total ID</th>
                <th>Right Total ID</th>
                <th>Rank</th>
                <th>Commission</th>
                <th>Eligibilty</th>
                <th>Action</th>


              </tr>
            </thead>
            <tbody>


              <tr>

                <td>1</td>
                <td>50</td>
                <td>50</td>

                   <td><span class="badge bg-primary">Silver</span></td>
                   <td>$50</td>

                <td>  <?php
                    $left_count = App\Models\User::where('id',Auth::id())->first();
                    $right_count = App\Models\User::where('id',Auth::id())->first();
                  //  dd($left_count->left_count);

                   ?>
                   @if($left_count->left_count > 49 && $right_count->right_count > 49)
                   <span class="badge bg-success">Eligible</span></td>


                   @else
                  <span class="badge bg-danger">Not Eligible</span></td>

                  @endif</td>
                <td>
                  @if($left_count->rank > 0)
                  <button disabled class="btn btn-success btn-sm" type="button" name="button">Already Claimed</button>
                  @else
                   @if($left_count->left_count > 49 && $right_count->right_count > 49)
                   <form class="hidden" action="{{route('claim-silver')}}" method="post">
                     @csrf
                     <input type="hidden" name="id" value="{{Auth::id()}}">
                     <input type="hidden" name="amount" value="50">

                     <button  class="btn btn-success btn-sm">Claim</button>
                   </form>
                   @else
                    <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                    @endif
                    @endif
                </td>

              </tr>
              <tr>

                <td>2</td>
                <td>300</td>
                <td>300</td>


                   <td><span class="badge bg-secondary">Bronze</span></td>
                   <td>$200</td>

                <td>

                  <?php
                    $left_count = App\Models\User::where('id',Auth::id())->first();
                    $right_count = App\Models\User::where('id',Auth::id())->first();
                  //  dd($left_count->left_count);

                   ?>

                   @if($left_count->left_count > 299 && $right_count->right_count > 299)
                   <span class="badge bg-success">Eligible</span></td>


                   @else
                  <span class="badge bg-danger">Not Eligible</span></td>

                  @endif

                <td>
                  @if($left_count->rank > 1)
                    <button disabled class="btn btn-success btn-sm" type="button" name="button">Already Claimed</button>
                  @else
                  @if($left_count->left_count > 299 && $right_count->right_count > 299)
                  <form class="hidden" action="{{route('claim-bronze')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::id()}}">
                    <input type="hidden" name="amount" value="200">

                    <button  class="btn btn-success btn-sm">Claim</button>
                  </form>
                  @else
                   <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                   @endif
                   @endif
                </td>

              </tr>
              <tr>

                <td>3</td>
                <td>1000</td>
                <td>1000</td>

                   <td><span class="badge bg-success">Gold</span></td>
                   <td>$500</td>

                <td>  <?php
                    $left_count = App\Models\User::where('id',Auth::id())->first();
                    $right_count = App\Models\User::where('id',Auth::id())->first();
                  //  dd($left_count->left_count);

                   ?>
                   @if($left_count->left_count > 999 && $right_count->right_count > 999)
                   <span class="badge bg-success">Eligible</span></td>


                   @else
                  <span class="badge bg-danger">Not Eligible</span></td>

                  @endif</td>
                <td>
                  @if($left_count->rank > 2)
                    <button disabled class="btn btn-success btn-sm" type="button" name="button">Already Claimed</button>
                  @else
                  @if($left_count->left_count > 999 && $right_count->right_count > 999)
                  <form class="hidden" action="{{route('claim-gold')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::id()}}">
                    <input type="hidden" name="amount" value="500">

                    <button  class="btn btn-success btn-sm">Claim</button>
                  </form>
                  @else
                   <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                   @endif
                   @endif
                </td>

              </tr>
              <tr>

                <td>4</td>
                <td>4000</td>
                <td>4000</td>

                   <td><span class="badge bg-danger">Platinum</span></td>
                   <td>$2,000</td>

                <td> <?php
                    $left_count = App\Models\User::where('id',Auth::id())->first();
                    $right_count = App\Models\User::where('id',Auth::id())->first();
                  //  dd($left_count->left_count);

                   ?>
                   @if($left_count->left_count > 3999 && $right_count->right_count > 3999)
                   <span class="badge bg-success">Eligible</span></td>


                   @else
                  <span class="badge bg-danger">Not Eligible</span></td>

                  @endif</td>
                <td>
                  @if($left_count->left_count > 3999 && $right_count->right_count > 3999)
                  <a href="#" class="btn btn-success btn-sm" >Claim</a>
                  @else
                   <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                   @endif
                </td>

              </tr>
              <tr>

                <td>5</td>
                <td>20000</td>
                <td>20000</td>

                   <td><span class="badge bg-warning">Diamond</span></td>
                   <td>$10,000</td>

                <td><?php
                    $left_count = App\Models\User::where('id',Auth::id())->first();
                    $right_count = App\Models\User::where('id',Auth::id())->first();
                  //  dd($left_count->left_count);

                   ?>
                   @if($left_count->left_count > 19999 && $right_count->right_count > 19999)
                   <span class="badge bg-success">Eligible</span></td>


                   @else
                  <span class="badge bg-danger">Not Eligible</span></td>

                  @endif</td>
                <td>
                  @if($left_count->left_count > 19999 && $right_count->right_count > 19999)
                  <a href="#" class="btn btn-success btn-sm" >Claim</a>
                  @else
                   <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                   @endif
                </td>

              </tr>
              <tr>

                <td>6</td>
                <td>100000</td>
                <td>100000</td>

                   <td><span class="badge bg-info">Ambassador</span></td>
                   <td>$20,000</td>

                <td><?php
                    $left_count = App\Models\User::where('id',Auth::id())->first();
                    $right_count = App\Models\User::where('id',Auth::id())->first();
                  //  dd($left_count->left_count);

                   ?>
                   @if($left_count->left_count > 99999 && $right_count->right_count > 99999)
                   <span class="badge bg-success">Eligible</span></td>


                   @else
                  <span class="badge bg-danger">Not Eligible</span></td>

                  @endif</td>
                <td>
                  @if($left_count->left_count > 99999 && $right_count->right_count > 99999)
                  <a href="#" class="btn btn-success btn-sm" >Claim</a>
                  @else
                   <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                   @endif
                </td>

              </tr>







            </tbody>

          </table>
        </div>
      </div>
    </div>


    <script>
  		$(document).ready(function() {
  			$('#example').DataTable();
  		  } );
  	</script>
  	<script>
  		$(document).ready(function() {
  			var table = $('#example2').DataTable( {
  				lengthChange: false,
  				buttons: [ 'copy', 'excel', 'pdf', 'print']
  			} );

  			table.buttons().container()
  				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
  		} );
  	</script>




@endsection
