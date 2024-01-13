@extends('layouts.master_admin')
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
    display: block;
    margin: auto;
  }
  </style>
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
<div class='container-fluid' style="margin: auto">
     <form class="form-horizontal">
   <fieldset>
      <div class="m-3" id="panelIndemnity">
        <div id="indemnityDeet">
          <br/>
          <div id="farmerInfo">
            <h5 class="mx-2"> Farmer's Information</h5>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="farmersID" class="col-lg-6 control-label">Farmer's ID: </label>
                  <div class="col-lg-12">
                  <input type="text" class="form-control" id="farmersID" value="{{$indemnities->farmersID}}" name="farmersID" @readonly(true)>

                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                    <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_fname" value="{{$indemnities->firstName}}" name="firstName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_mname"  value="{{$indemnities->middleName}}" name="middleName" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="txt_lname" class="col-lg-6 control-label"> Last Name: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_lname" value="{{$indemnities->lastName}}" name="lastName" @readonly(true)>
                      </div>
                    </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_extname" class="col-lg-6 control-label">Extension Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_extname"  value="{{$indemnities->extensionName}}" name="extensionName" @readonly(true)>
                  </div>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_tel" class="col-lg-6 control-label">Contact Number: </label>
                  <div class="col-lg-12">
                    <input type="tel" class="form-control" id="txt_tel"  value="{{$indemnities->contactNumber}}" name="contactNumber" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                      <div class="col-lg-12">
                        <input type="email" class="form-control" id="txt_email" value="{{$indemnities->email}}" name="email" @readonly(true)>
                      </div>
                    </div>
              </div>
            </div>
            <br/>
            <h5 class="mx-2"> Farmer's Address</h5>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_email" value="{{$indemnities->barangayAddress}}" name="barangayAddress" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Municipality: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="cityAddress" value="{{$indemnities->cityAddress}}" name="cityAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="provinceAddress" value="{{$indemnities->provinceAddress}}" name="provinceAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Region: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="regionAddress" value="{{$indemnities->regionAddress}}" name="regionAddress">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <h5 class="mx-2"> Insured Crops Information</h5>
          <div id="panelCropInfo"> 
            <div id="cropInfo">
              <h5 class="mx-2"> Crop Details</h5>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="txt_insuredID" class="col-lg-12 control-label">Crops Insurance ID:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_insuredID" value="{{$indemnities->id}}" name="damageID" @readonly(true)>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="cropName" class="col-lg-12 control-label">Crops Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_crops" value="{{$indemnities->cropName}}" name="cropName" @readonly(true)>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="txt_contact" class="col-lg-12 control-label">Variety :</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_crops" value="{{$indemnities->variety}}" name="variety" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="cicNumber" class="col-lg-6 control-label">CIC Number:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="cicNumber" value="{{$indemnities->cicNumber}}" name="cicNumber" @readonly(true)>
                    </div>
                  </div>
                </div> 
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="cicNumber" class="col-lg-6 control-label">Policy Number:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="cicNumber" value="{{$indemnities->policyNumber}}" name="policyNumber" @readonly(true)>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="cicNumber" class="col-lg-6 control-label">Insurance Type:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="cicNumber" value="{{$indemnities->insuranceType}}" name="insuranceType" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="dateSowing" class="col-lg-6 control-label">Date of Sowing: </label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="dateSowing" value="{{$indemnities->dateSowing}}" name="dateSowing" @readonly(true)>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="datePlanted" class="col-lg-6 control-label">Date of Planting: </label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="datePlanted" value="{{$indemnities->datePlanted}}" name="datePlanted" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_farmersID" class="col-lg-6 control-label">Underwriter/ Cooperative: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_plant" value="{{$indemnities->underwriterName}}" name="underwriterName">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_farmersID" class="col-lg-6 control-label"> Program: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_harvest" value="{{$indemnities->program}}" name="program" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
              <div id="farmDeetInfo">
              <h5 class="mx-2"> Farm Details</h5>
                <br/>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_farmersID" class="col-lg-2 control-label">Sitio: </label>
                      <div class="col-lg-12">
                        <input type="text"  class="form-control" id="txt_sitio" value="{{$indemnities->sitio}}" name="sitio" @readonly(true)>
                      </div>
                    </div>
                  </div>  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="barangay" class="col-lg-2 control-label">Barangay:</label>
                      <div class="col-lg-12">
                        <input type="text"  class="form-control" id="txt_sitio" value="{{$indemnities->barangayFarm}}" name="barangayFarm" @readonly(true)>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Municipality: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="{{$indemnities->cityFarm}}" name="cityFarm">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="{{$indemnities->provinceFarm}}" name="provinceFarm">
                  </div>
                </div>
              </div>
            </div>       
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Region: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_area"value="{{$indemnities->regionFarm}}" name="regionFarm">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="txt_contact" class="col-lg-2 control-label">Area Insured:</label>
                      <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_area" value="{{$indemnities->areaInsured}}" name="areaInsured" @readonly(true)>
                      </div>
                  </div>
              </div>
            </div>
            <br/>        
          </div>
        </div>
        <div id="BoundryInfo">
          <h5 class="mx-2"> Boundaries</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-2 control-label">North: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_north" value="{{$indemnities->north}}" name="north" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-2 control-label">East: </label>
                <div class="col-lg-12">
                  <input type="text"  class="form-control" id="txt_east" value="{{$indemnities->east}}" name="east" @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-2 control-label"> West: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_bank_west" value="{{$indemnities->west}}" name="west" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-2 control-label"> South: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_bank_south" value="{{$indemnities->south}}" name="south" @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <br/>
        <div id="damageInfo">
          <h5 class="mx-2"> Damage Information</h5>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Nature/Cause of Loss:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_city_farm" value="{{$indemnities->damageCause}}" name="damageCause" @readonly(true)>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Date of Loss:</label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="dt_farm" value="{{$indemnities->dateLoss}}" name="dateLoss" @readonly(true)>
                    </div>
                  </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_contact" class="col-lg-12 control-label">Age/Stage of Cultivation at times of loss:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_city_farm" value="{{$indemnities->growthStage}}"name="growthStage" @readonly(true)>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-12 control-label">Area Damaged (ha):</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="dt_farm" value="{{$indemnities->areaDamage}}" name="areaDamage" @readonly(true)> 
                    </div>
                  </div>
            </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txt_contact" class="col-lg-6 control-label">Extent of Loss/Damage (%):</label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_city_farm" value="{{$indemnities->extentDamage}}" name="extentDamage" @readonly(true)>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_contact" class="col-lg-12 control-label">Estimated of Harvest (if Applicable):</label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="dt_harvest" value="{{$indemnities->dateHarvest}}" name="dateHarvest" @readonly(true)>
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
                    <input type="text" class="form-control" id="txt_sign_name" value="{{$indemnities->signature}}" name="signature" @readonly(true)> 
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Date Submitted :</label>
                  <div class="col-lg-12">
                    <input type="date" class="form-control" id="dt_submitted" value="{{$indemnities->dateSubmitted}}" name="dateSubmitted" @readonly(true)>
                  </div>
              </div>
            </div>
        </div>
        </div>       
        <br/>        
      </div>
    </div>
   </fieldset>
  </form>
<script>
$(document).keypress(
    function(event){
        if (event.which == '13') {
        event.preventDefault();
        }
    });
</script>
</div>
@endsection