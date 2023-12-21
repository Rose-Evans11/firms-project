@extends('layouts.master_farmer')
@section('title','Indemnity')
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
        <button class="btn btn-success m-2 col-md-12" style="width:100%" onclick="javascript:toggleIndemnity()" id="btn_add"> Add Indemnity Claim</Button>
      </div>
    </div>
  </div>
    <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Indemnity ID</th>
                    <th>Crop Insurance ID</th>
                    <th>Notice of Loss ID</th>
                    <th>Crops</th>
                    <th>Date of Loss</th>
                    <th>Expected Harvest Date</th>
                    <th>Farm Location</th>
                    <th>Status</th>
                    <th>Notes</th>
                    
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
      <div class="m-3" id="panelIndemnity">
        <div id="indemnityDeet">
          <br/>
          <div id="farmerInfo">
            <h5 class="mx-2"> Farmer's Information</h5>
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_fname" value="{{Auth::User()->firstName}}" name="firstName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_mname"  value="{{Auth::User()->middleName}}" name="middleName" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="txt_lname" class="col-lg-6 control-label"> Last Name: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_lname" value="{{Auth::User()->lastName}}" name="lastName" @readonly(true)>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="txt_extname" class="col-lg-6 control-label">Extension Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_extname"  value="{{Auth::User()->extensionName}}" name="extensionName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_tel" class="col-lg-6 control-label">Contact Number: </label>
                  <div class="col-lg-12">
                    <input type="tel" class="form-control" id="txt_tel"  value="{{Auth::User()->contactNumber}}" name="contactNumber" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                      <div class="col-lg-12">
                        <input type="email" class="form-control" id="txt_email" value="{{Auth::User()->email}}" name="email" @readonly(true)>
                      </div>
                    </div>
              </div>
            </div>
            <br/>
            <h5 class="mx-2"> Farmer's Address</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example" @readonly(true) name="barangayAddress">
                      <option selected>{{Auth::User()->barangayAddress}}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Municipality: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="Tanauan City">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="Batangas">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <h5 class="mx-2"> Insured Crops Information</h5>
          <div id="panelCropInfo"> 
            <div id="cropInfo">
              <legend> <strong>Crop Details</strong> </legend>
              <br/>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_insuredID" class="col-lg-6 control-label">Crops Insurance ID:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_insuredID" value="" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_farmersID" class="col-lg-2 control-label">Crops: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_crops" value="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-2 control-label">Variety :</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Variety</option>
                          <option value="1">None</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Planting Method:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Method</option>
                          <option value="1">None</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_farmersID" class="col-lg-6 control-label">Date of Sowing: </label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="txt_sitio" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_farmersID" class="col-lg-6 control-label">Date of Planting: </label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="txt_plant" value="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_farmersID" class="col-lg-6 control-label">Date of Harvesting: </label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="txt_harvest" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Land Category:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Land Category</option>
                          <option value="1">None</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Soil Types:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Soil Types</option>
                          <option value="1">None</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Topography:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Topography</option>
                          <option value="1">None</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txt_contact" class="col-md-12 control-label">Source of Irrigation:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Irrigation</option>
                          <option value="1">None</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Tenurial Status:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Tenurial Status</option>
                          <option value="1">None</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div id="farmDeetInfo">
                  <legend> <strong>Farm Details</strong> </legend>
                  <br/>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_farmersID" class="col-lg-2 control-label">Sitio: </label>
                          <div class="col-lg-12">
                            <input type="text"  class="form-control" id="txt_sitio" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                          <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Barangay</option>
                              <option value="1">None</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_farmersID" class="col-lg-2 control-label">Municipality: </label>
                          <div class="col-lg-12">
                            <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="Tanauan City">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_farmersID" class="col-lg-2 control-label">Province: </label>
                          <div class="col-lg-12">
                            <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="Batangas">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_farmersID" class="col-lg-2 control-label">Area: </label>
                          <div class="col-lg-12">
                            <input type="text" @readonly(true) class="form-control" id="txt_area" value="Tanauan City">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="txt_contact" class="col-lg-2 control-label">Soil pH:</label>
                              <div class="col-lg-12">
                                <select class="form-select" aria-label="Default select example">
                                  <option selected>Soil pH</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                </select>
                              </div>
                          </div>
                      </div>
                    </div>
                    <br/>
                  </div>
                </div>
                <div id="BoundryInfo">
                  <legend> <strong>Boundaries </strong></legend>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmersID" class="col-lg-2 control-label">North: </label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_north" value="">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmersID" class="col-lg-2 control-label"> South: </label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_bank_south" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmersID" class="col-lg-2 control-label">East: </label>
                        <div class="col-lg-12">
                          <input type="text"  class="form-control" id="txt_east" value="">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmersID" class="col-lg-2 control-label"> West: </label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_bank_west" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="location">Location: </label>
                    <input type="text" id="location" name="location" class="form-control map-input">
                  </div>
                </div>
               <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="location-lat"  class="col-lg-12 control-label">Latitude:</label>
                        <input type="text" id="location-lat" name="location-lat" class="form-control col-lg-12">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                         <label for="location-lng"  class="col-lg-12 control-label">Longitude:</label>
                         <input type="text" id="location-lng" name="location-lng" class=" form-control col-lg-12">
                        </div>
                       </div>
                </div>
            <br/>
            </div>
          </div>
          <br/>
          <div id="damageInfo">
            <h5 class="mx-2"> Damage Information</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_lossID" class="col-lg-6 control-label">Loss ID:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_lossID" value="">
                  </div>
                </div>
              </div>
            </div>
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
                      <label for="txt_contact" class="col-lg-12 control-label">Estimated of Harvest (if Applicable):</label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="dt_harvest" value="">
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        <br/>
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
        <br/>
        <div class="d-flex justify-content-center mt-3"> 
          <br/>
          <button class="btn btn-sm btn-success m-2" type="submit" style="width:20%">Reset</button>
          <button class="btn btn-sm btn-success m-2" type="submit" style="width:20%" onclick="javascript:save()">Save</button>
        </div>
      </div>
   </fieldset>
  </form>
<script>
  window.onload = function() {
    panelIndemnity.style.display = 'none';
    };
  function toggleIndemnity() {

    // get the current value of the panel's display property
    var displaySetting = panelIndemnity.style.display;

    // now toggle the panel depending on current state
    if (displaySetting == 'block') {
      // panel is visible. hide it
      panelIndemnity.style.display = 'none';
    }
    else {
      // panel is hidden. show it
      panelIndemnity.style.display = 'block';
      btn_add.style.display = 'none';
    }
  }

  function save() {

// get the current value of the panel's display property
var displaySetting = panelIndemnity.style.display;

// now toggle the panel depending on current state
if (displaySetting == 'block') {
  // panel is visible. hide it
  //panelfarmList.style.display = 'none';
}
else {
  // panel is hidden. show it
  panelIndemnity.style.display = 'none';
  btn_add.style.display = 'block';
}
}
</script>
</div>
@endsection