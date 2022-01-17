<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="clubbonusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Give Bonus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="jquery-val-form" action="{{route('club-bonus-store')}}" method="post">
              @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label class="form-label" for="basic-default-name">Enter Amount</label>
                    <input type="text" class="form-control" id="basic-default-name" name="bonus" placeholder="Enter Amount" required/>

                </div>


        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn btn-primary">Give</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
