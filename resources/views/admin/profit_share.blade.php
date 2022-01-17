@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Profit Share</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">Profit Share</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">Profit Share</h6>
      <hr>
        <a class="flex-right btn btn-success" href="#"  data-bs-toggle="modal" data-bs-target="#profitshareModal">Give Profit Share</a>
          @include('admin.modals.profitsharemodal')
      </div>





    </div>


    <hr/>

     @if(Session::has('profit_added'))
   <div class="alert alert-success" role="alert">
       <h4 class="alert-heading">Success</h4>
       <div class="alert-body">
           {{Session::get('profit_added')}}
       </div>
   </div>
   @endif


    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Status</th>



              </tr>
            </thead>
            <tbody>
              @foreach($users as $row)

              <tr>

                <td>{{$loop->index+1}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->user_name}}</td>
                <td>@if($row->activation_status==1)
                    <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif</td>



              </tr>
              @endforeach







            </tbody>

          </table>
        </div>
      </div>
    </div>


    <script>
  		$(document).ready(function() {
  			$('#example2').DataTable();
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
