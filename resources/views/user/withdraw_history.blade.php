@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">History</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Withdraw History</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Withdraw History</h6>
      </div>

    </div>


    <hr/>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>SL</th>
                <th>Date</th>

                <th>Amount</th>
                <th>Status</th>



              </tr>
            </thead>
            <tbody>
                @foreach($transferData as $transfer)
              <tr>

                <td>{{$loop->index+1}}</td>
                <td>{{$transfer->created_at}}</td>


                <td>{{$transfer->amount ?? ''}}</td>

                <td>
                    @if($transfer->status == 'pending')
                  <span class="badge bg-info">{{ $transfer->status }}</span>


                  @elseif($transfer->status == 'approve')
                  <span class="badge bg-success">{{ $transfer->status }}</span>


                  @else
                    <span class="badge bg-danger">{{ $transfer->status }}</span>

                  @endif


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
