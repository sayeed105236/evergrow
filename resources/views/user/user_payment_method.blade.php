@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Payment Method</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">My Payment Method</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">My Payment Method</h6>
      </div>
      <div class="col">
      <a class="flex-right btn btn-success" href="#"  data-bs-toggle="modal" data-bs-target="#userpaymentmethodModal">Add</a>
      @include('user.modals.user_payment_method_modal')
      </div>


    </div>


    <hr/>
    @if(Session::has('Wallet_added'))
  <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Success</h4>
      <div class="alert-body">
          {{Session::get('Wallet_added')}}
      </div>
  </div>
  @elseif(Session::has('wallet_updated'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Success</h4>
    <div class="alert-body">
        {{Session::get('wallet_updated')}}
    </div>
</div>
@elseif(Session::has('wallet_deleted'))
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Success</h4>
  <div class="alert-body">
      {{Session::get('wallet_deleted')}}
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
                <th>Payment Method Name</th>
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
                <td>{{$row->payment->name}}</td>
                <td>{{$row->acc_name}}</td>
                <td>{{$row->wallet_id}}</td>
                <td>
                  @if($row->status=="Active")
                      <span class="badge bg-success">{{ $row->status }}</span>
                  @else
                  <span class="badge bg-danger">{{ $row->status }}</span>
                  @endif
                </td>
                <td>  <a href="#" data-bs-toggle="modal" data-bs-target="#userpaymentmethodeditModal{{$row->id}}"><i class='bx bx-edit'></i></a>
                

                  @include('user.modals.user_payment_method_edit_modal')

              </tr>
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
