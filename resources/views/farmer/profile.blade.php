@extends('layouts.master_farmer')
@section('title','Profile')
@section('content')
<style>
    #img_id, #img_profile {
    display: none;
    margin: auto;
  }
</style>
<div class='container-fluid' style="margin: auto">
    <form action="/profile" method="POST">
      @csrf
        <fieldset>
            <div id="panelFarmInfo">
                <div class="m-3" id='farmInfo'>
                  <legend> <strong> Farmer's Information</strong></legend>
                  <br/>
                  <h5 class="mx-2"> Basic Information</h5>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txt_farmersID" class="col-lg-12 control-label">Farmer's ID: </label>
                            <div class="col-lg-12">
                              <input type="text" @readonly(true) class="form-control" id="txt_farmersID" value="{{Auth::User()->id}}" name="farmersID">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txt_farmersID" class="col-lg-12 control-label">RSBSA Number (System-generated) </label>
                            <div class="col-lg-12">
                              <input type="text" @readonly(true) class="form-control" id="txt_farmersID" value="{{Auth::User()->rsbsa}}" name="rsbsa">
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="txt_fname" class="col-lg-12 control-label">First Name: </label>
                            <div class="col-lg-12">
                              <input type="text" class="form-control" id="txt_fname" placeholder="First Name" value="{{Auth::User()->firstName}}" name="firstName">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label for="txt_mname" class="col-lg-12 control-label">Middle Name: </label>
                              <div class="col-lg-12">
                                <input type="text" class="form-control" id="txt_mname" placeholder="Middle Name" value="{{Auth::User()->middleName}}" name="middleName">
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="txt_lname" class="col-lg-12 control-label">Last Name: </label>
                            <div class="col-lg-12">
                              <input type="text" class="form-control" id="txt_lname" placeholder="Last Name" value="{{Auth::User()->lastName}}" name="lastName">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_extname" class="col-lg-12 control-label">Extension Name: </label>
                                <div class="col-lg-12">
                                <input type="text" class="form-control" id="txt_extname" placeholder="Extension Name" value="{{Auth::User()->extensionName}}" name="extensionName">
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="form-group">
                          <label for="file_profile" class="col-lg-12 control-label">Profile Picture: </label>
                          <div class="col-lg-12">
                          <input type="file" class="form-control" id="file_profile" placeholder="" accept="image/jpg, image/jpeg, image/png" onchange="loadFile(event)">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group my-5 text-center">
                        <img id="img_profile" alt="Your Image" style="width: 150px; height:auto" class="img-fluid" />
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                          <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example">
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
                  <div class="row">
                    <div class="col-md-6"> 
                      <div class="form-group">
                        <label for="txt_gender" class="col-lg-2 control-label">Gender: </label>
                        <div class="col-lg-12">
                          <select class="form-select aria-label="Default select example"  >
                            <option selected> {{Auth::User()->sex}} </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                      </div>
                       
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="txt_religion" class="col-lg-2 control-label">Religion: </label>
                            <div class="col-lg-12">
                            <input type="text" class="form-control" id="txt_religion" value="" placeholder="Religion" name="religion">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txt_civil" class="col-lg-12 control-label">Civil Status: </label>
                            <div class="col-lg-12">
                              <select class="form-select" aria-label="Default select example">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Widowed">Widowed</option>
                              </select>
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txt_mother" class="col-lg-12 control-label">Mother's Maiden Name: </label>
                            <div class="col-lg-12">
                              <input type="text" class="form-control" id="txt_mother" value="" placeholder="Mother's Maiden Name">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txt_spouse" class="col-lg-12 control-label">Name of Spouse (if married): </label>
                            <div class="col-lg-12">
                              <input type="text" class="form-control" id="txt_spouse" value="" placeholder="Name of Spouse">
                            </div>
                          </div>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="dt_birth" class="col-lg-2 control-label">Birthdate: </label>
                          <div class="col-lg-12">
                            <input type="date" class="form-control" id="dt_birth" value="{{Auth::User()->birthdate}}" name=birthdate>
                          </div>
                        </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="txt_age" class="col-lg-2 control-label">Age: </label>
                      <div class="col-lg-12">
                      <input type="number" class="form-control" id="txt_age"  placeholder="Age" readonly value="{{Auth::User()->age}}" name="age">
                      </div>
                    </div>
                  </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="txt_birthCity" class="col-lg-12 control-label"> Birthplace: (Municipality) </label>
                            <div class="col-lg-12">
                            <input type="text" class="form-control" id="txt_birthCity" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="txt_birthProvince" class="col-lg-12 control-label">Birthplace: (Province) </label>
                            <div class="col-lg-12">
                            <input type="text" class="form-control" id="txt_birthProvince" placeholder="Province">
                            </div>
                        </div>
                    </div>
                  </div>
                  <br/>
                  <h5 class="mx-2">Contact Information </h5>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="txt_email" class="col-lg-2 control-label">Email: </label>
                          <div class="col-lg-12">
                            <input type="email" class="form-control" id="txt_email" name="email" @readonly(true) value="{{Auth::User()->email}}">
                          </div>
                        </div> 
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="txt_tel" class="col-lg-12 control-label">Contact Number: </label>
                          <div class="col-lg-12">
                            <input type="tel" class="form-control" id="txt_tel" value="">
                          </div>
                        </div>
                    </div>
                  </div>
                  <br/>
                  <h5 class="mx-2">Highest Formal Education</h5>
                  <div class="row">
                      <div class="col-md-12">
                        <label for="txt_education" class="col-lg-12 control-label">Education:</label>
                      <select class="form-select" aria-label="Default select example" class="col-lg-12" id="txt_education">
                        <option selected>Education</option>
                        <option value="Pre School">Pre School</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High School (non K-12)">High School (non K-12)</option>
                        <option value="Junior High School">Junior High School </option>
                        <option value="Senior High School">Senior High School</option>
                        <option value="College">College</option>
                        <option value="Vocational">Vocational</option>
                        <option value="Post Graduate">Post Graduate</option>
                        <option value="None">None</option>
                      </select>
                      </div>
                  </div>
                  <br/>
                  <h5 class="mx-2">Additional Information </h5>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="txt_ip" class="col-lg-12 control-label">Members of Indigenous Group:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example" id="txt_ip">
                          <option selected>Indigenous People</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="ip_tribe" class="col-lg-2 control-label">IP Tribe:</label>
                          <div class="col-lg-12">
                            <input type="text" class="form-control" id="ip_tribe" placeholder="Tribe">
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="txt_4ps" class="col-lg-12 control-label">4P's Beneficiaries:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example" id="txt_4ps">
                          <option selected>4P's Member</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="txt_contact" class="col-lg-12 control-label">Person with Disability:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>PWD</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <label for="dd_withGovernID" class="col-lg-12 control-label">With Government ID:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example" id="dd_withGovernID">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="dd_governID" class="col-lg-12 control-label">Government ID:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example" id="dd_governID">
                          <option value="National ID">National ID</option>
                          <option value="Passport ID">Passport ID</option>
                          <option value="UMID ID">UMID ID</option>
                          <option value="Driver's License">Driver's License</option>
                          <option value="PRC ID">PRC ID</option>
                          <option value="Senior Citizen ID">Senior Citizen ID</option>
                          <option value="School ID">School ID</option>
                          <option value="Voter's ID">Voter's ID</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="form-group">
                          <label for="file_id" class="col-lg-12 control-label">Government ID: </label>
                          <div class="col-lg-12">
                          <input type="file" class="form-control" id="file_id" placeholder="" accept="image/jpg, image/jpeg, image/png" onchange="loadFileID(event)">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group my-5 text-center">
                        <img id="img_id" alt="Your Image" style="width: 150px; height:auto" class="img-fluid" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="dd_farmCoop" class="col-lg-12 control-label">Members of Farmers Cooperative/Association:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example" id="dd_farmCoop">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txt_farmCoop" class="col-lg-12 control-label">If yes, specify:</label>
                        <div class="col-lg-12">
                          <input type="text" class="form-control" id="txt_farmCoop" placeholder="Farmers Cooperative/Association">
                        </div>
                      </div>
                    </div>
                  </div>
                  <br/>
                  <h5 class="mx-2">Household Information </h5>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="dd_houseHead" class="col-lg-12 control-label">Household Head:</label>
                      <div class="col-lg-12">
                        <select class="form-select" aria-label="Default select example" id="dd_houseHead">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="txt_householdHead" class="col-lg-12 control-label">If no, name of the Household Head:</label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_householdHead" placeholder="Name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="txt_numberHousehold" class="col-lg-12 control-label">Number of living household members:</label>
                      <div class="col-lg-12">
                        <input type="number" class="form-control" id="txt_numberHousehold" placeholder="Members">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="txt_numberHouseholdM" class="col-lg-12 control-label">Number of Male:</label>
                      <div class="col-lg-12">
                        <input type="number" class="form-control" id="txt_numberHouseholdM" placeholder="Male">
                      </div>
                    </div>
                    <div class="col-md-4"> <label for="txt_numberHouseholdF" class="col-lg-12 control-label">Number of Female:</label>
                      <div class="col-lg-12">
                        <input type="number" class="form-control" id="txt_numberHouseholdF" placeholder="Female">
                      </div>
                    </div>
                  </div>
                  <br/>
                  <h5 class="mx-2">In case of Emergency </h5>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="text_personEmergency" class="col-lg-12 control-label">Person's to notify in case of emergency:</label>
                      <div class="col-lg-12">
                        <input type="text" class="form-control" id="text_personEmergency" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="txt_contactEmergency" class="col-lg-12 control-label">Contact Number:</label>
                      <div class="col-lg-12">
                        <input type="tel" class="form-control" id="txt_contactEmergency" placeholder="Contact Number">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </fieldset>
        <div class="row">
          <div class="d-flex justify-content-center mt-3"> 
            <br/>
            <button class="btn btn-sm btn-success m-2" type="submit" style="width:20%">Save</button>
           </div>
          </div>
        </div>
    </form>
</div>
<script>

  var img_profile =document.getElementById('img_profile');
  var img_id =document.getElementById('img_id');
  window.onload = function() {
    img_profile.style.display = 'none';
    img_id.style.display = 'none';
  }
  //this is for displaying profile pic
    var loadFile =function(event){
      img_profile.src =URL.createObjectURL(event.target.files[0]);
      var displaySetting = img_profile.style.display;

      if (displaySetting == 'none') {
        img_profile.style.display = 'block';
      }    
    };

    //this is for displaying valid id
    var loadFileID =function(event){
      img_id.src =URL.createObjectURL(event.target.files[0]);
      var displaySetting = img_id.style.display;
      if (displaySetting == 'none') {
      img_id.style.display = 'block';
      }

    };
</script>
@endsection