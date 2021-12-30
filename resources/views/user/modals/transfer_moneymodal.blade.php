<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="transfermoneyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Transfer Money</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="jquery-val-form" action="{{route('money-transfer')}}" method="post">
              @csrf
              <div class="form-group">
                  <label for="select-country">Transfer User</label>

                  <select class="single-select form-control" name="user_id" required>


                      @foreach ( $data['user'] as $row)
                          <option value="{{$row->id}}">{{$row->user_name}}</option>
                      @endforeach

                  </select>

              </div>

                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Enter Amount</label>
                    <input type="number" min="5" id="basic-default-email" name="amount" class="form-control" placeholder="Enter Amount ($)" required/>
                </div>



        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn btn-success">Transfer</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
