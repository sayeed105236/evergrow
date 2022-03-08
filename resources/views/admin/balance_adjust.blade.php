@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Adjust Balance</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Adjust Lists</li>
          </ol>
        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Adjust Balance Lists</h6>
    <hr/>

        <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#balanceadjustModal">Add/Deduct Balance</a>
        @include('admin.modals.adjustbalancemodal')


    <hr>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Name</th>
                <th>Amount</th>
                <!-- <th>Reason</th> -->


                <th>Created</th>

              </tr>
            </thead>
            <tbody>

                @foreach($adjusts as $row)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$row->user->name}}</td>
                <td>{{$row->user->email}}</td>
                <td>{{$row->user->user_name}}</td>
                <td>{{$row->amount}}</td>
                <!-- <td></td> -->
                <td>{{$row->created_at}}</td>


              </tr>
              @endforeach






            </tbody>

          </table>
        </div>
      </div>
    </div>
    @push('scripts')
    <script>
        $("body").on("keyup", "#username", function () {
            let searchData = $("#username").val();
            if (searchData.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("get-user")}}',
                    data: {search: searchData},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        $('#suggestUser').html(result.success)
                        console.log(result.data)
                        if (result.data) {
                            $("#position").val("");
                        } else {
                            $("#position").val("");
                        }
                    }
                });
            }
            if (searchData.length < 1) $('#suggestUser').html("")
        })
    </script>
@endpush

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
