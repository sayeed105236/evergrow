<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="settingseditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

          <form id="jquery-val-form" action="{{route('store-system-settings')}}" method="post">
            @csrf
            <?php
            $settings=App\Models\Settings::first();
            //dd($settings);

             ?>
            <input type="hidden" name="id" value="{{$settings->id}}">
              <div class="col-md-12">
                  <div class="form-group">
                <label for="inputFirstName" class="form-label">Minimum Deposit</label>
                <input type="text" value="{{($settings->min_deposit)}}" name="min_deposit" class="form-control">
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">


                <label for="inputLastName" class="form-label">Minimum Transfer</label>
                <input type="text" value="{{($settings->min_transfer)}}" name="min_transfer" class="form-control">
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputFirstName" class="form-label">Minimum Withdraw</label>
                <input type="text" value="{{($settings->min_withdraw)}}" name="min_withdraw" class="form-control">
              </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Sponsor Bonus</label>
                <input type="text" value="{{($settings->sponsor_bonus)}}" name="sponsor_bonus" class="form-control">
              </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputFirstName" class="form-label">Pair Bonus</label>
                <input type="text" value="{{($settings->pair_bonus)}}" name="pair_bonus" class="form-control">
              </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Profit Bonus</label>
                <input type="text" value="{{($settings->profit_bonus)}}" name="profit_bonus" class="form-control">
              </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                <label for="inputFirstName" class="form-label">Club Bonus</label>
                <input type="text" value="{{($settings->club_bonus)}}" name="club_bonus" class="form-control">
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Unit Bonus</label>
                <input type="text" value="{{($settings->unit_bonus)}}" name="unit_bonus" class="form-control">
              </div>
              </div>
              <br>


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
