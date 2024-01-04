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
  {{Session::get('success')}}
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
      <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Farmer's ID</th>
                <th>RSBSA</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Extension Name</th>
                <th>Barangay</th>
                <th>Active</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        @if(count($users) > 0)
         @foreach ($users as $user)
         <tr>
          <td>{{$user->id}} </td>
          <td>{{$user->rsbsa}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->firstName}}</td>
          <td>{{$user->middleName}}</td>
          <td>{{$user->lastName}}</td>
          <td>{{$user->extensionName}}</td>
          <td>{{$user->barangayAddress}}</td>
          <td>{{$user->isActive}}</td>
          <td> <a href="{{route('farmer.edit', ['user'=>$user])}}"> Edit</a></td>
         </tr>
         @endforeach
         @else
          <tr><td>No result found!</td></tr>
         @endif
        </tbody>
    </table>
    </div>
  
    <!-- this is for adding farmer -->
  <form class="form-horizontal" action="/register" method="POST">
    @csrf
   <fieldset>
    <div class="m-3" id="panelfarmList">
      <div id="farmDeetInfo">
        <legend> <strong>Add new Farmer</strong> </legend>
        <br/>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmerID" class="col-lg-12 control-label">Farmer's ID:</label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="txt_farmerID" value="" placeholder="Farmer's ID" name="farmerID">
                </div>
              </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <label for="txt_RSBSA" class="col-lg-12 control-label">RSBSA Number: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_RSBSA" value="" placeholder="RSBSA" name="rsbsa" required maxlength="19" minlength="19">
              </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_fname" value="" placeholder="First Name" name="firstName" required>
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
                <input type="text" class="form-control" id="txt_lname" value="" placeholder="Last Name" name="lastName" required>
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
              <div class="form-group">
                <label for="dt_birth" class="col-lg-6 control-label">Birthdate: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="dt_birth" value="" name="birthdate" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dd_sex" class="col-lg-2 control-label">Sex :</label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example"  id="dd_sex" required name='sex'>
                    <option selected>Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                <div class="col-lg-12">
                  <input type="email" class="form-control" id="txt_email" value="" placeholder="Email" name="email" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_pass" class="col-lg-6 control-label"> Password: </label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="txt_pass" value="" placeholder="" name="password" required>
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
  </script>
</div>
@endsection 