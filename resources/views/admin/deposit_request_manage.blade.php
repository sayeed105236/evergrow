@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Deposit Requests</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Deposit Requests</li>
          </ol>
        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Requests</h6>
    <hr/>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Requested Amount</th>
                <th>Method</th>
                <th>Transaction Id</th>
                <th>Status</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach($deposit as $row)
              <tr>

                <td>{{$loop->index+1}}</td>
                <td>{{$row->user->user_name}}</td>
                <td>{{$row->amount}}$</td>
                <td>{{$row->method}}</td>
                <td>{{$row->txn_id}}</td>
                <td>
                  <span class="badge bg-success">{{ $row->status }}</span>
                  @if($row->status=='pending')
                  <a href="{{ url('/admin/add-money-approve/'.$row->id) }}" class="btn btn-sm btn-primary">Approve Now</a>
                  @endif
                </td>


                <td>

                    <a href="/admin/add-money-delete/{{$row->id}}"><i class='bx bx-trash'></i></a>
                </td>


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
