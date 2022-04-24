@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Settings</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">manage Settings</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Manage Settings</h6>
      </div>
      <div class="row">
        <div class="col-xl-7 mx-auto">
          <h6 class="mb-0 text-uppercase">System Settings</h6>
          <hr>
          <div class="col-12">
            <?php
            $data=App\Models\Settings::count();


             ?>

             @if($data< 1)

                <a class="btn btn-primary px-5"  data-bs-toggle="modal" data-bs-target="#settingsaddModal">Add</a>
                @include('admin.modals.settingsaddmodal')

              @endif
              <a class="btn btn-primary px-5 flex-right"  data-bs-toggle="modal" data-bs-target="#settingseditModal">Edit</a>
            </div>



            @include('admin.modals.settingseditmodal')

          <hr/>
          <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
              <?php
              $settings=App\Models\Settings::first();
              //dd($settings);

               ?>


              <form class="row g-3">
                <div class="col-md-6">
                  <label for="inputFirstName" class="form-label">Minimum Deposit ($)</label>
                  <input type="text" value="{{($settings->min_deposit)}}" disabled name="min_deposit" class="form-control" id="inputFirstName">
                </div>
                <div class="col-md-6">
                  <label for="inputLastName" class="form-label">Minimum Transfer ($)</label>
                  <input type="text"  value="{{($settings->min_deposit)}}" disabled class="form-control" id="inputLastName">
                </div>
                <div class="col-md-6">
                  <label for="inputFirstName" class="form-label">Minimum Withdraw ($)</label>
                  <input type="text"  value="{{($settings->min_withdraw)}}" disabled class="form-control" id="inputFirstName">
                </div>
                <div class="col-md-6">
                  <label for="inputLastName" class="form-label">Sponsor Bonus ($)</label>
                  <input type="text"  value="{{($settings->sponsor_bonus)}}" disabled class="form-control" id="inputLastName">
                </div>
                <div class="col-md-6">
                  <label for="inputFirstName" class="form-label">Pair Bonus ($)</label>
                  <input type="text"  value="{{($settings->pair_bonus)}}" disabled class="form-control" id="inputFirstName">
                </div>

                <div class="col-md-6">
                  <label for="inputLastName" class="form-label">Withdraw Charge ($)</label>
                  <input type="text"  value="{{($settings->withdraw_charge)}}" disabled class="form-control" id="inputLastName">
                </div>


              </form>
            </div>
          </div>


        </div>
      </div>




    <hr/>



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
