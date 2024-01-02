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
  <form class="form-horizontal" action="/notice-loss" method="post">
    @csrf
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
                      <input type="text" class="form-control" hidden id="farmersID" value="{{$insurances->farmersID}}" name="farmersID" @readonly(true)>
                      <input type="text" class="form-control" id="txt_fname" value="{{$insurances->firstName}}" name="firstName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_mname" value="{{$insurances->middleName}}" name="middleName" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="txt_lname" class="col-lg-6 control-label"> Last Name: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_lname" value="{{$insurances->lastName}}" name="lastName" @readonly(true)>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="txt_extname" class="col-lg-6 control-label">Extension Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_extname" value="{{$insurances->extensionName}}" name="extensionName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_tel" class="col-lg-6 control-label">Contact Number: </label>
                  <div class="col-lg-12">
                    <input type="tel" class="form-control" id="txt_tel" value="{{$insurances->contactNumber}}" name="contactNumber"@readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                      <div class="col-lg-12">
                        <input type="email" class="form-control" id="txt_email" value="{{$insurances->email}}" name="email" @readonly(true)>
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
                    <input type="text" class="form-control" id="barangayAddress" value="{{$insurances->barangayAddress}}" name="barangayAddress" @readonly(true)>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="cityAddress" class="col-lg-2 control-label">Municipality: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="cityAddress" value="{{$insurances->cityAddress}}" name="cityAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="provinceAddress" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="{{$insurances->provinceAddress}}" name="provinceAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="regionAddress" class="col-lg-2 control-label">Region: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="regionAddress" value="{{$insurances->regionAddress}}" name="regionAddress">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <h5 class="mx-2"> Insured Crops Information</h5>
          <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                  <label for="txt_insuredID" class="col-lg-12 control-label">Crop Insurance ID: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_insuredID" value="{{$insurances->id}}" name="cropInsuranceID" @readonly(true)>
                  </div>
                </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-6 control-label">Insured Crops: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$insurances->cropName}}" name="cropName" @readonly(true)>
                </div>
              </div>
            </div> 
            <div class="col-md-2">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-6 control-label">Variety: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$insurances->variety}}" name="variety" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-6 control-label">Insured Type: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$insurances->insuranceType}}" name="insuranceType" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-12 control-label">Policy Number: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$insurances->policyNumber}}" name="policyNumber" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="txt_insuredCrop" class="col-lg-6 control-label">CIC Number: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_insuredCrop" value="{{$insurances->cicNumber}}" name="cicNumber" @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="dateSowing" class="col-lg-6 control-label">Date of Sowing: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="dateSowing" value="{{$insurances->dateSowing}}" name="dateSowing" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="datePlanted" class="col-lg-6 control-label">Date of Planting: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="datePlanted" value="{{$insurances->datePlanted}}" name="datePlanted" @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="dateSowing" class="col-lg-6 control-label">North: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="north" value="{{$insurances->north}}" name="north" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="datePlanted" class="col-lg-6 control-label">East: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="east" value="{{$insurances->east}}" name="east" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="dateSowing" class="col-lg-6 control-label">West: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="west" value="{{$insurances->west}}" name="west" @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="datePlanted" class="col-lg-6 control-label">South: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="south" value="{{$insurances->south}}" name="south" @readonly(true)>
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
                    <input type="text" class="form-control" id="barangayAddress" value="{{$insurances->sitio}}" name="sitio" @readonly(true) hidden>
                    <input type="text" class="form-control" id="txt_insuredCrop" value="{{$insurances->barangayFarm}}" name="barangayFarm"  @readonly(true)>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Municipality/City: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="{{$insurances->cityFarm}}" name="cityFarm">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="provinceFarm" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="provinceFarm" value="{{$insurances->provinceFarm}}" name="provinceFarm">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="regionFarm" class="col-lg-2 control-label">Region: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="regionFarm" value="{{$insurances->regionFarm}}" name="regionFarm">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <div id="damageInfo">
            <h5 class="mx-2"> Damage Information</h5>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Program:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_city_farm" value="" name="program">
                  </div>
                </div>
            </div> <div class="col-md-3">
              <div class="form-group">
                <label for="txt_contact" class="col-lg-6 control-label">Growth Stage:</label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_city_farm" value="" name="growthStage">
                </div>
              </div>
          </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Area Insured:</label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="dt_farm" value="{{$insurances->areaInsured}}" @readonly(true) name="areaInsured">
                      </div>
                    </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_contact" class="col-lg-12 control-label">Estimated of Harvest (if Applicable):</label>
                  <div class="col-lg-12">
                    <input type="date" class="form-control" id="dt_harvest" value="{{$insurances->dateHarvest}}" name="dateHarvest" @readonly(true)>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Nature/Cause of Loss:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_city_farm" value="" name="damageCause">
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="txt_contact" class="col-lg-6 control-label">Date of Loss:</label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="dt_farm" value="" name="dateLoss">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="txt_contact" class="col-lg-6 control-label">Extent of Loss/Damage:</label>
                          <div class="col-lg-12">
                            <input type="text" class="form-control" id="txt_city_farm" value="" name="extentDamage">
                          </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="txt_contact" class="col-lg-6 control-label"> Area Damage:</label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_city_farm" value="" name="areaDamage">
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
                  <label for="txt_contact" class="col-lg-6 control-label">Type your Name for the Signature:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_sign_name" value="" name="signature">
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Date Submitted :</label>
                  <div class="col-lg-12">
                    <input type="date" class="form-control" id="dt_submitted" value="" name="dateSubmitted">
                  </div>
              </div>
            </div>
        </div>
        <br/>
        <div class="d-flex justify-content-center mt-3"> 
          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-sm btn-success m-2" href="{{ URL::previous() }}" style="width:100%">Cancel</button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-sm btn-success m-2" type="submit" style="width:100%">Add</button>
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