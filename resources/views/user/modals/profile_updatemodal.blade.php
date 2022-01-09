<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="editprofilemodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="jquery-val-form"   action="{{ route('user-profile-update') }}" enctype="multipart/form-data" method="post">
              @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Applicant Name</label>
                    <input type="text" value="{{Auth::user()->name}}" class="form-control" id="name" name="name" placeholder="Username"  />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">User Name</label>
                    <input type="text" disabled value="{{Auth::user()->user_name}}" class="form-control"  placeholder="Username" />
                </div>
                <br>
                <br>
                <div class="input-group mb-3">
									<label class="input-group-text" for="inputGroupFile01">Profile Photo</label>
									<input type="file" class="form-control" id="image" name="file">
								</div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Applicant National Id</label>
                    <input type="number" class="form-control" id="national_id" name="national_id" placeholder="National Id" value="************" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Email</label>
                    <input type="email" disabled value="{{Auth::user()->email}}" class="form-control" placeholder="Email" value="granger007@hogward.com" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Phone Number</label>
                    <input type="number" value="{{Auth::user()->number}}" id="number" name="number" class="form-control"
                           placeholder="Enter your phone Number" />
                </div>


              <div class="form-group">
                    <label for="select-country">Gender</label>

                    <select id="DestinationOptions" class="form-control select2"  name="gender" required>

                      <option label="Choose Gender"></option>


                      <option value="male">Male</option>
                      <option value="female">Female</option>


                    </select>


                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Date of Birth</label>
                    <input type="date" id="birth" name="birth" class="form-control" placeholder=""
                           required/>
                </div>



                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Personal Address</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder=""
                           required/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Nominee Name</label>
                    <input type="text" id="nominee" name="nominee" class="form-control" placeholder=""
                           required/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Nominee Email</label>
                    <input type="email" id="nominee_email" name="nominee_email" class="form-control" placeholder=""
                           required/>
                </div>



        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn btn-primary">Update</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
