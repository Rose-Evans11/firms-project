@extends('layouts.master_admin')
@section('title','Profile')
@section('content')
<style>
    #img_id, #img_profile {
    display: none;
    margin: auto;
  }
</style>
<div class='container-fluid' style="margin: auto">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @if (session()->has('success'))
    <div class="alert alert-success">
     {{Session::get('success')}}
    </div> 
  @endif
    <form action="{{ route('admin.update.profile', Auth::guard('admin')->user()->id)}}" method="POST">
      @csrf
      @method('put')
        <fieldset>
          <div class="m-3" id="panelfarmList">
      <div id="farmDeetInfo">
        <legend> <strong>Add New Admin</strong> </legend>
        <br/>
        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_fname" value="Yes" name="isActive" @required(true) hidden>
                  <input type="text" class="form-control" id="txt_fname" value="{{Auth::guard('admin')->user()->firstName}}" placeholder="First Name" name="firstName" @required(true)>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_mname" value="{{Auth::guard('admin')->user()->middleName}}" placeholder="Middle Name" name="middleName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_lname" class="col-lg-6 control-label">Last Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_lname" value="{{Auth::guard('admin')->user()->lastName}}" placeholder="Last Name" name="lastName" @required(true)>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_ext" class="col-lg-6 control-label">Extension Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_ext" value="{{Auth::guard('admin')->user()->extensionName}}" placeholder="Extension Name" name="extensionName">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
              <div class="col-lg-12">
                <input type="email" class="form-control" id="txt_email" value="{{Auth::guard('admin')->user()->email}}" @readonly(true) placeholder="Email" name="email" @required(true) autocomplete="email">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_email" class="col-lg-6 control-label"> Contact Number: </label>
              <div class="col-lg-12">
                <input type="tel" class="form-control" id="txt_email" value="{{Auth::guard('admin')->user()->contactNumber}}" placeholder="Contact Number" name="contactNumber" @required(true)>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label for="txt_fname" class="col-lg-6 control-label">Office: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_fname" value="{{Auth::guard('admin')->user()->office}}" placeholder="Office" name="office" @required(true)>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_mname" class="col-lg-6 control-label">Department: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_mname" value="{{Auth::guard('admin')->user()->department}}" placeholder="Department" name="department" @required(true)>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_lname" class="col-lg-6 control-label"> Position: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_lname" value="{{Auth::guard('admin')->user()->position}}" placeholder="Position" name="position" required>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_ext" class="col-lg-6 control-label"> Role: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_ext" value="{{Auth::guard('admin')->user()->role}}" placeholder="Role" name="role">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-md-2">
          <div class="col-lg-12 d-flex justify-content-end">
            <div class="row">
              <div class="col-md-6">
                <a class="btn btn-sm btn-success m-2" href="#" style="width:100%">Cancel</a>
              </div>
              <div class="col-md-6">
                <button class="btn btn-sm btn-success m-2" type="submit" style="width:100%">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </fieldset>
  </form>
</div>
<script>

  var img_profile =document.getElementById('img_profile');
  var img_id =document.getElementById('img_id');
  window.onload = function() {
    img_profile.style.display = 'none';
    img_id.style.display = 'none';
  }
  //this is for displaying profile pic
    var loadFile =function(event){
      img_profile.src =URL.createObjectURL(event.target.files[0]);
      var displaySetting = img_profile.style.display;

      if (displaySetting == 'none') {
        img_profile.style.display = 'block';
      }    
    };

    //this is for displaying valid id
    var loadFileID =function(event){
      img_id.src =URL.createObjectURL(event.target.files[0]);
      var displaySetting = img_id.style.display;
      if (displaySetting == 'none') {
      img_id.style.display = 'block';
      }

    };


    $(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
</script>
@endsection