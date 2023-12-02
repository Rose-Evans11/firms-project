@extends('layouts.master_farmer')
@section('title','Notice of Loss')
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
        <div class="col-lg-10">
          table
        </div>
        <div class="col-lg-2 d-flex justify-content-end">
          <button class="btn btn-success m-2" style="width:100%" onclick="javascript:toggleNoticeLoss()" id="btn_add"> Add Notice of Loss</Button>
        </div>
    </div>

  <form class="form-horizontal">
   <fieldset>
   
    <div class="m-3" id="panelNoticeLoss">
      <div id="farmDeetInfo">
        <legend> <strong>Notice of Loss </strong> </legend>
        <br/>
        <h5 class="mx-2"> Farm Location</h5>
        <div>
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
          <br/>
          <h5 class="mx-2"> Damage Information</h5>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Nature/Cause of Loss:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_city_farm" value="">
                  </div>
                </div>
              </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Date of Loss:</label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="dt_farm" value="">
                    </div>
                  </div>
            </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txt_contact" class="col-lg-6 control-label">Extent of Loss/Damage:</label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_city_farm" value="">
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txt_contact" class="col-lg-6 control-label">Type of Crop:</label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_crop" value="">
                        </div>
                      </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="txt_contact" class="col-lg-12 control-label">Estimated of Harvest (if Applicable):</label>
                        <div class="col-lg-12">
                          <input type="date" class="form-control" id="dt_harvest" value="">
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Contact Number:</label>
                    <div class="col-lg-12">
                      <input type="tel" class="form-control" id="txt_contact" value="">
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Type your Name for the Signature:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_sign_name" value="">
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Date Submitted :</label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="dt_submitted" value="">
                    </div>
                </div>
              </div>
          </div>
        </div>
          <br/>
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

  function toggleNoticeLoss() {

    // get the current value of the panel's display property
    var displaySetting = panelNoticeLoss.style.display;

    // now toggle the panel depending on current state
    if (displaySetting == 'block') {
      // panel is visible. hide it
      panelNoticeLoss.style.display = 'none';
    }
    else {
      // panel is hidden. show it
      panelNoticeLoss.style.display = 'block';
      btn_add.style.display = 'none';
    }
  }

  function save() {

// get the current value of the panel's display property
var displaySetting = panelNoticeLoss.style.display;

// now toggle the panel depending on current state
if (displaySetting == 'block') {
  // panel is visible. hide it
  //panelfarmList.style.display = 'none';
}
else {
  // panel is hidden. show it
  panelNoticeLoss.style.display = 'none';
  btn_add.style.display = 'block';
}
}
</script>
</div>
@endsection