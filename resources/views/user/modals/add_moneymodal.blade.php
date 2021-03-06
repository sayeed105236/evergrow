<div class="col">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="addmoneyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Money</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <form id="jquery-val-form" action="{{route('money-store')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                            <div class="form-group">
                                <label class="form-label" for="basic-default-email">Enter Amount</label>
                                <input type="number" min="{{$settings->min_deposit}}" id="basic-default-email"
                                       name="amount" class="form-control" placeholder="Enter Amount ($)" required/>
                            </div>


                            <div class="form-group">
                                <label for="select-country">Payment Method</label>

                                <select id="DestinationOptions" class="form-control select2" name="method" required>

                                    <option label="Choose category"></option>
                                    <?php
                                    $payment = App\Models\PaymentMethod::all()
                                    ?>
                                    <?php foreach ($payment as $row): ?>
                                    <option id="{{$row->wallet_id}}" value="{{$row->name}}">{{$row->name}}</option>

                                    <?php endforeach; ?>

                                </select>


                            </div>
                            <div class="form-group">
                                <label class="form-label" for="basic-default-email">Wallet Id</label>
                                <input type="text" disabled id="wallet_id" class="form-control"/>
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="basic-default-email">Transaction Id</label>
                                <input type="text" id="basic-default-email" name="txn_id" class="form-control"
                                       placeholder="Enter Transaction Id" required/>
                            </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="Submit" class="btn btn-primary">Deposit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
