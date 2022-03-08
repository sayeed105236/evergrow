<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="balanceadjustModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adjust Balance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="jquery-val-form" action="{{route('store-adjust')}}" method="post">
              @csrf
              <div class="form-group">
                  <label class="form-label" for="basic-default-email">Enter User Name</label>
                  <input type="text" id="username" name="user_id" class="form-control"
                         placeholder="Enter User Name" required/>

                  <div id="suggestUser"></div>
              </div>

                <div class="form-group">
                    <label class="form-label" for="basic-default-name">Enter Amount</label>
                    <input type="number" class="form-control" id="basic-default-name" name="amount" placeholder="Enter Amount" required/>

                </div>


        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn btn-primary">Save</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
