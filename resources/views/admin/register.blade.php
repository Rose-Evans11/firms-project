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

  <form class="form-horizontal">
   <fieldset>
    <div class="m-3" id="panelfarmList">
      <div id="farmDeetInfo">
        <legend> <strong>Add new Farmer</strong> </legend>
        <br/>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example"  id="dd_barangay_farm">
                    <option selected>Barangay</option>
                    <option value="1">None</option>
                  </select>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_farmersID" class="col-lg-2 control-label">Municipality/City: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="Tanauan City">
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
                    <label for="txt_contact" class="col-lg-6 scontrol-label">Ownership Type:</label>
                    <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example"  id="dd_own_type">
                        <option selected>Owner Type</option>
                        <option value="1">Registered Owner</option>
                        <option value="2">Tenant</option>
                        <option value="3">Lesse</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_farmersID" class="col-lg-6 control-label">Name of the Owner: </label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_land_owner" value="">
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Within Ancestral Domain:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_ancestral_domain">
                        <option selected>Select</option>
                        <option value="1">Yes</option>
                        <option value="2"> No </option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Agrarian Reform Beneficiary:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_ancestral_benefi">
                        <option selected>Select</option>
                        <option value="1">Yes</option>
                        <option value="2"> No </option>
                      </select>
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

@endsection 