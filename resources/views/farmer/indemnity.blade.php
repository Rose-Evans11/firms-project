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
    display: block;
    margin: auto;
  }
  </style>
<div class='container-fluid' style="margin: auto">
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
              <div class="col-md-3">
                  <div class="form-group">
                    <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_fname" value="{{$insurances->firstName}}" name="firstName" @readonly(true)>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_mname"  value="{{$insurances->middleName}}" name="middleName" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="txt_lname" class="col-lg-6 control-label"> Last Name: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_lname" value="{{$insurances->lastName}}" name="lastName" @readonly(true)>
                      </div>
                    </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_extname" class="col-lg-6 control-label">Extension Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_extname"  value="{{$insurances->extensionName}}" name="extensionName" @readonly(true)>
                  </div>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_tel" class="col-lg-6 control-label">Contact Number: </label>
                  <div class="col-lg-12">
                    <input type="tel" class="form-control" id="txt_tel"  value="{{$insurances->contactNumber}}" name="contactNumber" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
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
                  <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_email" value="{{$insurances->barangayAddress}}" name="barangayAddress" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Municipality: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="cityAddress" value="{{$insurances->cityAddress}}" name="cityAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="provinceAddress" value="{{$insurances->provinceAddress}}" name="provinceAddress">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-2 control-label">Region: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="regionAddress" value="{{$insurances->regionAddress}}" name="regionAddress">
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
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="txt_insuredID" class="col-lg-6 control-label">Crops Insurance ID:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_insuredID" value="{{$insurances->id}}" name="id" @readonly(true)>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cicNumber" class="col-lg-6 control-label">CIC Number:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="cicNumber" value="{{$insurances->cicNumber}}" name="cicNumber" @readonly(true)>
                    </div>
                  </div>
                </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="cropName" class="col-lg-2 control-label">Crops: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_crops" value="{{$insurances->cropName}}" name="cropName">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-12 control-label">Variety :</label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_crops" value="{{$insurances->variety}}" name="variety">
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
                        <input type="date" class="form-control" id="dateSowing" value="{{$insurances->dateSowing}}" name="dateSowing">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="datePlanted" class="col-lg-6 control-label">Date of Planting: </label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="datePlanted" value="{{$insurances->datePlanted}}" name="datePlanted">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_farmersID" class="col-lg-6 control-label">Underwriter/ Cooperative: </label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_plant" value="" name="underwriterName">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_farmersID" class="col-lg-6 control-label"> Program: </label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="txt_harvest" value="" name="program">
                      </div>
                    </div>
                  </div>
                </div>
                <div id="farmDeetInfo">
                  <legend> <strong>Farm Details</strong> </legend>
                  <br/>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_farmersID" class="col-lg-2 control-label">Sitio: </label>
                          <div class="col-lg-12">
                            <input type="text"  class="form-control" id="txt_sitio" value="sitio">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="barangay" class="col-lg-2 control-label">Barangay:</label>
                              <div class="col-lg-12">
                                <select class="form-select" aria-label="Default select example" name="barangayFarm" required>
                                  <option value="Altura Bata">Altura Bata</option>
                                  <option value="Altura Matanda">Altura Matanda</option>
                                  <option value="Altura South">Altura South</option>
                                  <option value="Ambulong">Ambulong</option></option>
                                  <option value="Banadero">Banadero</option>
                                  <option value="Bagbag">Bagbag</option>
                                  <option value="Bagumbayan">Bagumbayan</option>
                                  <option value="Balele">Balele</option>
                                  <option value="Banjo East">Banjo East</option>
                                  <option value="Banjo West">Banjo West</option>
                                  <option value="Bilog-Bilog">Bilog-Bilog</option>
                                  <option value="Boot">Boot</option>
                                  <option value="Cale">Cale</option>
                                  <option value="Darasa">Darasa</option></option>
                                  <option value="Gonzales">Gonzales</option>
                                  <option value="Hidalgo">Hidalgo</option>
                                  <option value="Janopol">Janopol</option>
                                  <option value="Janopol Oriental">Janopol Oriental</option>
                                  <option value="Laurel">Laurel</option>
                                  <option value="Luyos">Luyos</option>
                                  <option value="Mabini">Mabini</option>
                                  <option value="Malaking Pulo">Malaking Pulo</option>
                                  <option value="Maria Paz">Maria Paz</option></option>
                                  <option value="Maugat">Maugat</option>
                                  <option value="Montana">Montana</option>
                                  <option value="Natatas">Natatas</option>
                                  <option value="Pagaspas">Pagaspas</option>
                                  <option value="Pantay Bata">Pantay Bata</option>
                                  <option value="Pantay Matanda">Pantay Matanda</option>
                                  <option value="Poblacion 1">Poblacion 1</option>
                                  <option value="Poblacion 2">Poblacion 2</option>
                                  <option value="Poblacion 3">Poblacion 3</option>
                                  <option value="Poblacion 4">Poblacion 4</option>
                                  <option value="Poblacion 5">Poblacion 5</option>
                                  <option value="Poblacion 6">Poblacion 6</option>
                                  <option value="Poblacion 7">Poblacion 7</option>
                                  <option value="Sala">Sala</option>
                                  <option value="Sambat">Sambat</option>
                                  <option value="San Jose">San Jose</option>
                                  <option value="Santol">Santol</option>
                                  <option value="Santor">Santor</option>
                                  <option value="Sulpoc">Sulpoc</option>
                                  <option value="Suplang">Suplang</option>
                                  <option value="Talaga">Talaga</option></option>
                                  <option value="Tinurik">Tinurik</option>
                                  <option value="Trapiche">Trapiche</option>
                                  <option value="Ulango">Ulango</option>
                                  <option value="Wawa">Wawa</option>
                                </select>
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
                            <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="Tanauan City" name="cityFarm">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_farmersID" class="col-lg-2 control-label">Province: </label>
                          <div class="col-lg-12">
                            <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="Batangas" name="provinceFarm">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txt_farmersID" class="col-lg-2 control-label">Region: </label>
                          <div class="col-lg-12">
                            <input type="text" @readonly(true) class="form-control" id="txt_area" value="CALABARZON" name="regionFarm">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="txt_contact" class="col-lg-2 control-label">Area Insured:</label>
                              <div class="col-lg-12">
                            <input type="text" class="form-control" id="txt_area" value="" name="areaInsured">
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
                          <input type="text" class="form-control" id="txt_north" value="" name="north">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmersID" class="col-lg-2 control-label"> South: </label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_bank_south" value="" name="south">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmersID" class="col-lg-2 control-label">East: </label>
                        <div class="col-lg-12">
                          <input type="text"  class="form-control" id="txt_east" value="" name="east">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmersID" class="col-lg-2 control-label"> West: </label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_bank_west" value="" name="west">
                        </div>
                      </div>
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
                    <label for="txt_contact" class="col-lg-12 control-label">Age/Stage of Cultivation at times of loss:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_city_farm" value="" name="growthStage">
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="txt_contact" class="col-lg-12 control-label">Area Damaged (ha):</label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="dt_farm" value="" name="areaDamage">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="txt_contact" class="col-lg-6 control-label">Extent of Loss/Damage (%):</label>
                          <div class="col-lg-12">
                            <input type="text" class="form-control" id="txt_city_farm" value="" name="extentDamage">
                          </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txt_contact" class="col-lg-12 control-label">Estimated of Harvest (if Applicable):</label>
                      <div class="col-lg-12">
                        <input type="date" class="form-control" id="dt_harvest" value="" name="dateHarvest">
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
          <br/>
          <button class="btn btn-sm btn-success m-2" type="submit" style="width:20%" >Add</button>
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