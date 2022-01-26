@extends('layouts.admin-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">User Lists</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">User Lists</li>
          </ol>
        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Users</h6>
    <hr/>
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
                <th>Sponsor User Name</th>
                <th>Status</th>
                <th>Position</th>
                <th>Total L Active User</th>
                <th>Total R Active User</th>
                <th>Total Left Carry</th>
                <th>Total Right Carry</th>
                <th>Total Sponsor</th>
                <th>Created</th>

              </tr>
            </thead>
            <tbody>
                @foreach($users as $row)
              <tr>

                <td>{{$loop->index+1}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->user_name}}</td>
                <td>{{$row->sponsors->user_name}}</td>
                <td>@if($row->activation_status==1)
                    <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif</td>
                <td>
                  @if($row->position==1)
                  Left
                  @else
                    Right

                    @endif</td>
                    <td>{{$row->left_count}}</td>
                    <td>{{$row->right_count}}</td>
                    <td>{{$row->left_active}}</td>
                    <td>{{$row->right_active}}</td>
                    <td>
                      <?php
                      $refferals = App\Models\User::where('sponsor','$row->id')->get()->count('id');
                      //dd($refferals);


                      ?>
                      {{$refferals}}


                    </td>
                <td>{{$row->created_at}}</td>

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
