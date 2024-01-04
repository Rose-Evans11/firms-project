@extends('layouts.master_farmer')
@section('title','Farm List')
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
  
  #panelfarmList {
    display: none;
    margin: auto;
  }
  </style>
<div class='container-fluid' style="margin: auto">
  <div class="row">
    <div class="col-md-2">
      <div class="col-lg-12 d-flex justify-content-end">
        <button class="btn btn-success m-2" style="width:100%" onclick="javascript:toggleFarmInfo()" id="btn_add"> Add Farm</Button>
      </div>
    </div>
  </div>        
    <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Farm ID</th>
                    <th>Farm Area</th>
                    <th>Barangay</th>
                    <th>Farm Type</th>
                    <th>Document Type</th>
                    <th>Ownership Type </th>
                    <th>Name of Owner</th>
                </tr>
            </thead>
            <tbody>
           <!-- add here the data -->
            </tbody>
        </table>
        <div class="col-lg-10">
          <!-- table -->
        </div>
        <div class="col-lg-2 d-flex justify-content-end">
          <button class="btn btn-success m-2" style="width:100%" onclick="javascript:toggleFarmInfo()" id="btn_add"> Add Farm</Button>
        </div>
        
    </div>
  </div>        
    <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Farm ID</th>
                    <th>Farm Area</th>
                    <th>Barangay</th>
                    <th>Farm Type</th>
                    <th>Document Type</th>
                    <th>Ownership Type </th>
                    <th>Name of Owner</th>
                </tr>
            </thead>
            <tbody>
           <!-- add here the data -->
            </tbody>
        </table>
        </div>
        
    </div>

  <form class="form-horizontal">
   <fieldset>
   
    <div class="m-3" id="panelfarmList">
      <div id="farmDeetInfo">
        <legend> <strong>Farm Land Description</strong> </legend>
        <br/>
        <h5> Farm Parcel</h5>
        <h5 class="mx-2"> Farm Location</h5>
        <div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="dd_barangay_farm" class="col-lg-2 control-label">Barangay:</label>
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
              <label for="txt_city_farm" class="col-lg-2 control-label">Municipality/City: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="Tanauan City">
              </div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_farm_size" class="col-lg-6 control-label">Farm Area (ha): </label>
                  <div class="col-lg-12">
                    <input type="number" class="form-control" id="txt_farm_size" value="">
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dd_farm_type" class="col-lg-2 control-label">Farm Type:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_farm_type">
                        <option selected>Farm Type</option>
                        <option value="1">Irrigated</option>
                        <option value="2">Rainfed Upland</option>
                        <option value="3">Rainfed Lowland</option>
                      </select>
                    </div>
                </div>
            </div>
          </div>
        <br/>
        </div>
      </div>
      <div id="farmOwningInfo">
        <h5 class="mx-2"> Ownership Information</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dd_doc_type" class="col-lg-6 control-label">Ownership Document Type:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_doc_type">
                        <option selected>Document Type</option>
                        <option value="1">Certificate of Land Transfer</option>
                        <option value="2">Emancipation Patent</option>
                        <option value="3">Individual Certificate of Land Ownership Award (CLOA)</option></option>
                        <option value="4">Collective CLOA</option>
                        <option value="5">Co-Ownership CLOA</option>
                        <option value="6">Agricultural Sales Patent</option>
                        <option value="7">Homestead Patent</option>
                        <option value="8">Free Patent</option>
                        <option value="9">Certificate/Regular Title</option>
                        <option value="10">Certificate of Ancestral Domain Title</option>
                        <option value="11">Certificate of Ancestral Land Title</option>
                        <option value="12">Tax Declaration</option>
                        <option value="13">Barangay Certification</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="file_document" class="col-lg-6 control-label">Document :</label>
                    <div class="col-lg-12">
                      <input type="file" placeholder="Choose File"  id="file_document">
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dd_own_type" class="col-lg-6 scontrol-label">Ownership Type:</label>
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
                    <label for="txt_land_owner" class="col-lg-6 control-label">Name of the Owner: </label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_land_owner" value="">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div id="farmOther">
        <br>
        <h5 class="mx-2"> Other Details</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dd_ancestral_domain" class="col-lg-6 control-label">Within Ancestral Domain:</label>
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
                    <label for="dd_ancestral_benefi" class="col-lg-6 control-label">Agrarian Reform Beneficiary:</label>
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
          
      </div>
      <div class="d-flex justify-content-center mt-3"> 
        <br/>
        <button class="btn btn-sm btn-success m-2" type="submit" style="width:20%">Reset</button>
        <button class="btn btn-sm btn-success m-2" type="submit" style="width:20%" onclick="javascript:save()">Save</button>
       </div>
    </div>
   </fieldset>
   
  </form>
<script>

  function toggleFarmInfo() {

    // get the current value of the panel's display property
    var displaySetting = panelfarmList.style.display;

    // now toggle the panel depending on current state
    if (displaySetting == 'block') {
      // panel is visible. hide it
      panelfarmList.style.display = 'none';
    }
    else {
      // panel is hidden. show it
      panelfarmList.style.display = 'block';
      btn_add.style.display = 'none';
    }
  }

  function save() {

// get the current value of the panel's display property
var displaySetting = panelfarmList.style.display;

// now toggle the panel depending on current state
if (displaySetting == 'block') {
  // panel is visible. hide it
  //panelfarmList.style.display = 'none';
}
else {
  // panel is hidden. show it
  panelfarmList.style.display = 'none';
  btn_add.style.display = 'block';
}
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