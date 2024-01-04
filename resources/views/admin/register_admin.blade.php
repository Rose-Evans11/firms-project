
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
  <form action="{{ route('admin.find') }}" method="GET"> 
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <div class="row">
          <div class="col-lg-2">
            <label for="txt_RSBSA" class="control-label"> <h4> Search: </h4> </label>
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" placeholder="Search here....." name="query" value="{{ request()->input('query') }}" minlength="2" style="width:100%">
            <span class="text-danger">@error('query'){{ $message }} @enderror</span>
          </div>
          <div class="col-lg-5">
            <div class="form-group">
              <button type="submit" class="btn btn-success" style="width:100%">Search</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-wrapper" style=" width:100%; overflow-x:scroll">
        <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Admin's ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Extension Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Office</th>
                <th>Department</th>
                <th>Position</th>
                <th>Role</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        @if(count($admins) > 0)
         @foreach ($admins as $admin)
         <tr>
          <td>{{$admin->id}} </td>
          <td>{{$admin->firstName}}</td>
          <td>{{$admin->middleName}}</td>
          <td>{{$admin->lastName}}</td>
          <td>{{$admin->extensionName}}</td>
          <td>{{$admin->email}}</td>
          <td>{{$admin->contactNumber}}</td>
          <td>{{$admin->office}}</td>
          <td>{{$admin->department}}</td>
          <td>{{$admin->position}}</td>
          <td>{{$admin->role}}</td>
          <td> <a href="{{route('admin.edit', ['admin'=>$admin])}}" style="width:100%; text-decoration:none"> Edit</a></td>
         </tr>
         @endforeach
         @else
          <tr><td>No result found!</td></tr>
         @endif
        </tbody>
        </table>
      </div>
    </div>
  </div>
    <!-- this is for adding farmer -->
  <form class="form-horizontal" action="/register/admin" method="POST">
    @csrf
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
                    <input type="text" class="form-control" id="txt_fname" value="" placeholder="First Name" name="firstName" @required(true)>
                  </div>
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_mname" value="" placeholder="Middle Name" name="middleName">
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
              <label for="txt_lname" class="col-lg-6 control-label">Last Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_lname" value="" placeholder="Last Name" name="lastName" @required(true)>
              </div>
            </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_ext" class="col-lg-6 control-label">Extension Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_ext" value="" placeholder="Extension Name" name="extensionName">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
             <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="txt_email" class="col-lg-6 control-label"> Contact Number: </label>
                  <div class="col-lg-12">
                    <input type="tel" class="form-control" id="txt_email" value="" placeholder="Contact Number" name="contactNumber" @required(true)>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                  <div class="col-lg-12">
                    <input type="email" class="form-control" id="txt_email" value="" placeholder="Email" name="email" @required(true) autocomplete="email">
                  </div>
                </div>
              </div>
             </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_pass" class="col-lg-6 control-label"> Password: </label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="txt_pass" value=""name="password" @required(true) autocomplete="new-password"> 
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_fname" class="col-lg-6 control-label">Office: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_fname" value="" placeholder="Office" name="office" @required(true)>
                  </div>
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_mname" class="col-lg-6 control-label">Department: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_mname" value="" placeholder="Department" name="department" @required(true)>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
              <label for="txt_lname" class="col-lg-6 control-label"> Position: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_lname" value="" placeholder="Position" name="position" required>
              </div>
            </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_ext" class="col-lg-6 control-label"> Role: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_ext" value="" placeholder="Role" name="role">
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="form-group">
                <button class="btn btn-sm btn-success" type="submit" style="width:100%">Register</button>
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