@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Payment Method</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Payment Method</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Payment Method</h6>
      </div>
      <div class="col">
      <a class="flex-right btn btn-success" href="#"  data-bs-toggle="modal" data-bs-target="#paymentmethodModal">Add</a>
      </div>
      @include('admin.modals.payment_method_modal')
    </div>


    <hr/>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Account Name</th>
                <th>Wallet Id</th>
                <th>Status</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach($payment as $row)
              <tr>

                <td>{{$loop->index+1}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->acc_name}}</td>
                <td>{{$row->wallet_id}}</td>
                <td>
                  @if($row->status=="Active")

                    	<span class="badge bg-success">Active</span>
                  @else

                	<span class="badge bg-danger">Inactive</span>
                  @endif</td>
                <td>  <a href="#" data-bs-toggle="modal" data-bs-target="#PaymentMethodEditModal{{$row->id}}"><i class='bx bx-edit'></i></a>
                  <a href="/admin/payment-method/delete/{{$row->id}}"><i class='bx bx-trash'></i></a></td>
                  @include('admin.modals.payment_method_edit_modal')
              </tr>

                @endforeach





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
