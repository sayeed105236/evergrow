<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form class="validate-form" form action="{{route('change-password-store')}}" method="POST">
              @csrf
                <div class="row">

                        <div class="form-group">
                            <label for="account-old-password">Old Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                  <input name="old_password" class="form-control" type="text" value="{{(Auth::user()->password)}}">
                                  @error('old_password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="row">

                        <div class="form-group">
                            <label for="account-new-password">New Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                  <input name="new_password" class="form-control" type="password" value="">
                                  @error('new_password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="account-retype-new-password">Retype New Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                              <input name="password_confirmation" class="form-control" type="password" value="">
                              @error('password_confirmation')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                </div>
                            </div>
                        </div>



        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn btn-success">Update Password</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
