
@extends('layouts.master_admin')
@section('title','Register')
@section('content')
<style>
  .flip {
    font-size: 16px;
    padding: 10px;
    text-align: center;
    background-color: #198754;
    color: white;
    border: solid 1px #a6d8a8;
    margin: auto;
  }
  #txt_age, #txt_active{
    display: none;
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
  <form class="form-horizontal" action="{{route('admin.update', ['admin'=>$admin])}}" method="POST">
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
                  <input type="text" class="form-control" id="txt_fname" value="{{$admin->firstName}}" placeholder="First Name" name="firstName" @required(true)>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_mname" value="{{$admin->middleName}}" placeholder="Middle Name" name="middleName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_lname" class="col-lg-6 control-label">Last Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_lname" value="{{$admin->firstName}}" placeholder="Last Name" name="lastName" @required(true)>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_ext" class="col-lg-6 control-label">Extension Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_ext" value="{{$admin->extension}}" placeholder="Extension Name" name="extensionName">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
              <div class="col-lg-12">
                <input type="email" class="form-control" id="txt_email" value="{{$admin->email}}" placeholder="Email" name="email" @required(true) autocomplete="email">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_email" class="col-lg-6 control-label"> Contact Number: </label>
              <div class="col-lg-12">
                <input type="tel" class="form-control" id="txt_email" value="{{$admin->contactNumber}}" placeholder="Contact Number" name="contactNumber" @required(true)>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label for="txt_fname" class="col-lg-6 control-label">Office: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_fname" value="{{$admin->office}}" placeholder="Office" name="office" @required(true)>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_mname" class="col-lg-6 control-label">Department: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_mname" value="{{$admin->department}}" placeholder="Department" name="department" @required(true)>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_lname" class="col-lg-6 control-label"> Position: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_lname" value="{{$admin->position}}" placeholder="Position" name="position" required>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="txt_ext" class="col-lg-6 control-label"> Role: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_ext" value="{{$admin->role}}" placeholder="Role" name="role">
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
                <a class="btn btn-sm btn-success m-2" href="<?= url('firms/admin/register'); ?>" type="cancel" style="width:100%">Cancel</a>
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
  <script>
    var now = new Date(),
    // minimum date the user can choose, in this case now and in the future
    minDate = now.toISOString().substring(0,10);

$('#dt_birth').prop('min', minDate);

      //this following function is for calculating age based to their birthday and display it to input text age
      function ageCount() {
        var inputDate = document.getElementById("dt_birth").value;
    // Convert the input date to a Date object
    var date = new Date(inputDate);
    // Get the current date
    var today = new Date();
    // Calculate the difference in years, months and days
    var years = today.getFullYear() - date.getFullYear();
    var months = today.getMonth() - date.getMonth();
    var days = today.getDate() - date.getDate();
    // Adjust the values if needed
    if (months < 0 || (months == 0 && days < 0)) {
        years--;
        months += 12;
    }
    // Format the age as a string
    var age = years;
    // Display the age in the output input
    document.getElementById("txt_age").value = age;
  }
  $(document).keypress(
    function(event){
        if (event.which == '13') {
        event.preventDefault();
        }
    });
  </script>
</div>
@endsection 