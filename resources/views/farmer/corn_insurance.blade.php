@extends('layouts.master_farmer')
@section('title','Corn Insurance')
@section('content')
<div class='container-fluid' style="margin: auto">
  <form class="form-horizontal">
    <fieldset>
      <legend>Farmer's Information</legend>
        <div class="form-group">
          <label for="txt_farmersID" class="col-lg-2 control-label">Farmer's ID: </label>
          <div class="col-lg-12">
            <input type="text" @readonly(true) class="form-control" id="txt_farmersID" values="">
          </div>
        </div>
       
        <div class="form-group">
          <label for="txt_fname" class="col-lg-2 control-label">First Name: </label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="txt_fname" placeholder="First Name">
          </div>
        </div>
        <div class="form-group">
          <label for="txt_mname" class="col-lg-2 control-label">Middle Name: </label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="txt_mname" placeholder="Middle Name">
          </div>
        </div>
    
        <div class="form-group">
          <label for="txt_lname" class="col-lg-2 control-label">Last Name: </label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="txt_lname" placeholder="Last Name">
          </div>
        </div>
  
        <div class="form-group">
          <label for="txt_extname" class="col-lg-2 control-label">Extension Name: </label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="txt_extname" placeholder="Extension Name">
          </div>
        </div>
      <div class="form-group">
        <label for="dt_birth" class="col-lg-2 control-label">Birthdate : </label>
        <div class="col-lg-12">
          <input type="date" class="form-control" id="dt_birth" value="">
        </div>
      </div>

      <div class="form-group">
        <label for="txt_gender" class="col-lg-2 control-label">Gender : </label>
        <div class="col-lg-12">
          <select class="form-select" aria-label="Default select example">
            <option selected>Select Gender </option>
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Others</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="txt_civil" class="col-lg-2 control-label">Civil Status : </label>
        <div class="col-lg-12">
          <select class="form-select" aria-label="Default select example">
            <option selected>Select Civil Status</option>
            <option value="1">Single</option>
            <option value="2">Married</option>
            <option value="3">Separated</option>
            <option value="4">Widowed</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="txt_spouse" class="col-lg-2 control-label">Name of Spouse : </label>
        <div class="col-lg-12">
          <input type="text" class="form-control" id="txt_spouse" value="">
        </div>
      </div>

      <div class="form-group">
        <label for="txt_email" class="col-lg-2 control-label">Email : </label>
        <div class="col-lg-12">
          <input type="email" class="form-control" id="txt_email" value="">
        </div>
      </div>

      <div class="form-group">
        <label for="txt_tel" class="col-lg-2 control-label">Contact Number : </label>
        <div class="col-lg-12">
          <input type="tel" class="form-control" id="txt_tel" value="">
        </div>
      </div>
  
      <div class="form-group">
        <label for="txt_contact" class="col-lg-2 control-label">Barangay :</label>
        <div class="col-lg-12">
          <select class="form-select" aria-label="Default select example">
            <option selected>Barangay</option>
            <option value="1">None</option>
          </select>
        </div>
      </div>    
  
      <div class="form-group">
        <label for="ip_tribe" class="col-lg-2 control-label">IP Tribe</label>
        <div class="col-lg-12">
          <input type="text" class="form-control" id="ip_tribe" placeholder="Tribe">
        </div>
      </div>
  
      <div class="form-group">
        <div class="col-lg-12 col-lg-offset-2 mt-2">
          <button type="submit" class="btn btn-success">Next</button>
        </div>
      </div>
    </fieldset>
  </form>
  
</div>
@endsection