@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Activate Package</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Activate Package</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Activation</h6>
      </div>

    </div>


    <hr/>
    <div class="card">
      <div class="card-body">



        <h5><strong style="height:130px;">Your Current Available Balance: {{$data['sum_deposit'] ? '$'.number_format((float)$data['sum_deposit'], 2, '.', '') : '$00.00'}}</strong></h5>

        <?php if ($data['sum_deposit']<=0): ?>
          <h6 style="color:red;">You don't have Enough Balance. Please Deposit funds in your account for activation.</h6>
        <?php endif; ?>





        </div>
      </div>
      <div class="col-md-12 d-flex justify-content-center">


      <div class="col-md-6" >
        <div class="card mb-5 mb-lg-0 bg-success ">
          <div class="card-body">
            <h5 class="card-title text-white text-uppercase text-center">Activation Price</h5>
            <h3 class="card-price text-white text-center">$<span class="term">15</span></h3>
            <hr class="my-4">
            <ul class="list-group list-group-flush">
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Single User</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Sponsor Bonus</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Club Member/5 user</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Club Bonus</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Team Bonus</li>
              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Profit Share</li>

              <li class="list-group-item bg-transparent text-white"><i class='bx bx-check me-2 font-18'></i>Monthly Status Reports</li>
            </ul>
            <?php
            $activation= App\Models\User::where('id',Auth::id())->first();
            //dd($activation->activation_status);

             ?>
             @if($activation->activation_status>0)
             <div class="d-grid"> <button disabled href="#" class="btn btn-success my-2 radius-30">Already Activated</button>
             </div>

             @else
             @if ($data['sum_deposit']>0)
              <div class="d-grid"> <a href="#" data-bs-toggle="modal" data-bs-target="#addmoneyModal" class="btn btn-white my-2 radius-30">Activate Now</a>
              </div>
                @include('user.modals.activation_modal')
            @else
            <div class="d-grid"> <button disabled href="#" class="btn btn-danger my-2 radius-30">Activate Now</button>
            </div>
            @endif

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
