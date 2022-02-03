@extends('layouts.frontend-master')

@section('content')



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">My Rank</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">My Rank</li>





          </ol>

        </nav>
      </div>

    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col">
      <h6 class="mb-0 text-uppercase">My Rank</h6>
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
                <th>Left Total ID</th>
                <th>Right Total ID</th>
                <th>Rank</th>
                <th>Commission</th>
                <th>Eligibilty</th>
                <th>Action</th>


              </tr>
            </thead>
            <tbody>


              <tr>

                <td>1</td>
                <td>50</td>
                <td>50</td>

                   <td><span class="badge bg-primary">Silver</span></td>
                   <td>$50</td>

                <td><span class="badge bg-danger">Not Eligible</span></td>
                <td>
                    <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                </td>

              </tr>
              <tr>

                <td>2</td>
                <td>300</td>
                <td>300</td>


                   <td><span class="badge bg-secondary">Bronze</span></td>
                   <td>$200</td>

                <td><span class="badge bg-danger">Not Eligible</span></td>
                <td>
                    <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                </td>

              </tr>
              <tr>

                <td>3</td>
                <td>1000</td>
                <td>1000</td>

                   <td><span class="badge bg-success">Gold</span></td>
                   <td>$500</td>

                <td><span class="badge bg-danger">Not Eligible</span></td>
                <td>
                    <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                </td>

              </tr>
              <tr>

                <td>4</td>
                <td>4000</td>
                <td>4000</td>

                   <td><span class="badge bg-danger">Platinum</span></td>
                   <td>$2,000</td>

                <td><span class="badge bg-danger">Not Eligible</span></td>
                <td>
                    <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                </td>

              </tr>
              <tr>

                <td>5</td>
                <td>20000</td>
                <td>20000</td>

                   <td><span class="badge bg-warning">Diamond</span></td>
                   <td>$10,000</td>

                <td><span class="badge bg-danger">Not Eligible</span></td>
                <td>
                    <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                </td>

              </tr>
              <tr>

                <td>6</td>
                <td>100000</td>
                <td>100000</td>

                   <td><span class="badge bg-info">Ambassador</span></td>
                   <td>$20,000</td>

                <td><span class="badge bg-danger">Not Eligible</span></td>
                <td>
                    <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                </td>

              </tr>







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
