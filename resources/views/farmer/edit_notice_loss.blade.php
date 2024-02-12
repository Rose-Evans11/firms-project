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
  <form class="form-horizontal"  action="{{route('damage.update', ['damage'=>$damages])}}" method="Post">
    @csrf
    @method('put')
   <fieldset>
      <div class="m-3" id="panelNoticeLoss">
        <div id="noticeDeet">
          <br/>
          <div id="farmerInfo">
            <h5 class="mx-2"> Farmer's Information</h5>
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" hidden id="farmersID" value="{{$damages->farmersID}}" name="farmersID" @readonly(true)>
                      <input type="text" class="form-control" id="txt_fname" value="{{$damages->firstName}}" name="firstName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_mname" value="{{$damages->middleName}}" name="middleName" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="txt_lname" class="col-lg-6 control-label"> Last Name: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_lname" value="{{$damages->lastName}}" name="lastName" @readonly(true)>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="txt_extname" class="col-lg-6 control-label">Extension Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_extname" value="{{$damages->extensionName}}" name="extensionName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_tel" class="col-lg-6 control-label">Contact Number: </label>
                  <div class="col-lg-12">
                    <input type="tel" class="form-control" id="txt_tel" value="{{$damages->contactNumber}}" name="contactNumber"@readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                      <div class="col-lg-12">
                        <input type="email" class="form-control" id="txt_email" value="{{$damages->email}}" name="email" @readonly(true)>
                      </div>
                    </div>
              </div>
            </div>
            <br/>
            <h5 class="mx-2"> Farmer's Address</h5>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="barangayAddress" class="col-lg-2 control-label">Barangay:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="barangayAddress" value="{{$damages->sitio}}" name="sitio" @readonly(true) hidden>
                    <input type="text" class="form-control" id="barangayAddress" value="{{$damages->barangayAddress}}" name="barangayAddress" @readonly(true)>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="cityAddress" class="col-lg-2 control-label">Municipality: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="cityAddress" value="{{$damages->cityAddress}}" name="cityAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="provinceAddress" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="{{$damages->provinceAddress}}" name="provinceAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="regionAddress" class="col-lg-2 control-label">Region: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="regionAddress" value="{{$damages->regionAddress}}" name="regionAddress">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <h5 class="mx-2"> Insured Crops Information</h5>
          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_insuredID" class="col-lg-6 control-label">Crop Insurance ID: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_insuredID" value="{{$damages->id}}" name="cropInsuranceID" @readonly(true)>
                  </div>
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-6 control-label">Insured Crops: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$damages->cropName}}" name="cropName" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-6 control-label">Insured Crops: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$damages->insuranceType}}" name="insuranceType" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-6 control-label">Policy Number: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$damages->policyNumber}}" name="policyNumber" @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <div id="farmLoc">
            <h5 class="mx-2"> Farm Location</h5>
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                    <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                    <div class="col-lg-12">
                      <div class="form-group">
                    <input type="text" class="form-control" id="txt_insuredCrop" value="{{$damages->barangayFarm}}" name="barangayFarm"  @readonly(true)>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Municipality/City: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="{{$damages->cityFarm}}" name="cityFarm">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="provinceFarm" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="provinceFarm" value="{{$damages->provinceFarm}}" name="provinceFarm">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="regionFarm" class="col-lg-2 control-label">Region: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="regionFarm" value="{{$damages->regionFarm}}" name="regionFarm">
                  </div>
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
                    <label for="damageCause" class="col-lg-6 control-label">Nature/Cause of Loss:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="damageCause" value="{{$damages->damageCause}}" name="damageCause">
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Date of Loss:</label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="dt_farm" value="{{$damages->dateLoss}}"name="dateLoss">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="txt_contact" class="col-lg-6 control-label">Extent of Loss/Damage:</label>
                          <div class="col-lg-12">
                            <input type="text" class="form-control" id="txt_city_farm" value="{{$damages->extentDamage}}" name="extentDamage">
                          </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-12 control-label">Estimated of Harvest (if Applicable):</label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="dt_harvest" value="{{$damages->dateHarvest}}" name="dateHarvest" @readonly(true)>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="img_photo" class="col-lg-12 control-label">Crop before damage:</label>
                  <div class="col-lg-12">
                      <img src="{{('crop_before_location/' . $damages->crop_before)}}" style="width:150px; height:auto" alt="Crop before damage">
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="img_validID" class="col-lg-12 control-label">Crop after damage:</label>
                  <div class="col-lg-12">
                    <img src="{{('crop_after_location/' . $damages->crop_after)}}" style="width:150px; height:auto" alt="Crop after damage">
                  </div>
              </div>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-6">
              <input type="file" class="form-control" id="file_crop_before" accept="image/jpg, image/jpeg, image/png"  name="crop_before">
          </div>
          <div class="col-md-6">
              <input type="file" class="form-control" id="file_crop_after" accept="image/jpg, image/jpeg, image/png" name='crop_after'>
          </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Type your Name for the Signature:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_sign_name" value="{{$damages->signature}}"  name="signature">
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Date Submitted :</label>
                  <div class="col-lg-12">
                    <input type="date" class="form-control" id="dt_submitted" value="{{$damages->dateSubmitted}}"  name="dateSubmitted">
                  </div>
              </div>
            </div>
        </div>
        <br/>
        <div class="d-flex justify-content-end mt-3"> 
          <br/>
          <div class="row">
            <div class="col-md-6">
              <div class="col-lg-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-success m-2" type="submit" style="width:250%">Update</button>
              </div>
            </div>
          </div>
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