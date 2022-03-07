@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Buy Unit</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Buy Unit</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Buy Unit</h6>
      </div>

    </div>


    <hr/>
    @if(Session::has('unit_buy'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success</h4>
            <div class="alert-body">
                {{Session::get('unit_buy')}}
            </div>
        </div>
        @elseif(Session::has('unit_limit'))
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Failed</h4>
                <div class="alert-body">
                    {{Session::get('unit_limit')}}
                </div>
            </div>
            @elseif(Session::has('balance_limit'))
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Failed</h4>
                    <div class="alert-body">
                        {{Session::get('balance_limit')}}
                    </div>
                </div>
        @endif
    <div class="card">
      <div class="card-body">



        <h5><strong style="height:130px;">Your Current Available Balance: {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</strong></h5>

        <?php if ($data['sum_deposit']<=0): ?>
          <h6 style="color:red;">You don't have Enough Balance. Please Deposit funds in your account to buy Unit.</h6>
        <?php endif; ?>





        </div>
      </div>
      <div class="col-md-12 d-flex justify-content-center">


      <div class="col-md-6" >
        <div class="card mb-5 mb-lg-0 bg-success ">
          <div class="card-body">
            <h5 class="card-title text-white text-uppercase text-center">Per Unit Price</h5>
            <h3 class="card-price text-white text-center">$<span class="term">1</span></h3>
            <hr class="my-4">
            <ul class="list-group list-group-flush">
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Buy Unit $1 and earn $443.60</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>4/Units To Upgrade Next Level</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>0.40$ Bonus For Level 1</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>1.60$ Bonus For Level 2</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>6.40$ Bonus For Level 3</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>25.60$ Bonus For Level 4</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>409.60$ Bonus For Level 5</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Buy 10 Units Per Day</li>

            </ul>
            <?php
            $activation= App\Models\User::where('id',Auth::id())->first();
            //dd($activation->activation_status);

             ?>

             @if ($data['sum_deposit']>0)
              <div class="d-grid"> <a href="#" data-bs-toggle="modal" data-bs-target="#addmoneyModal" class="btn btn-white my-2 radius-30">Buy Now</a>
              </div>
                @include('user.modals.unit_buy_modal')
            @else
            <div class="d-grid"> <button disabled href="#" class="btn btn-danger my-2 radius-30">Buy Now</button>
            </div>
            @endif


          </div>
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
