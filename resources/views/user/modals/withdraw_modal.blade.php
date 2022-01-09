<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="walletwithdrawModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Withdraw</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="jquery-val-form" action="{{route('wallet-withdraw')}}" method="post">
              @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <?php
              $payment= App\Models\UserPayment::where('user_id',Auth::id())->where('status','Active')->get();

               ?>
               <div class="form-group">
                     <label for="select-country">Payment Method</label>

                     <select id="DestinationOptions" class="form-control select2"  name="payment_method_id" required>

                       <option label="Choose payment method"></option>

                        @foreach ( $payment as $row)
                            <option id="{{$row->payment->wallet_id}}" value="{{$row->id}}">{{$row->payment->name}}</option>
                        @endforeach
                     </select>


                 </div>

                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Enter Amount</label>
                    <input type="number" min="6" id="basic-default-email" name="amount" class="form-control" placeholder="Enter Amount ($)" required/>
                </div>





        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn btn-primary">Withdraw</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
