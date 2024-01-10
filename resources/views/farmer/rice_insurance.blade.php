@extends('layouts.master_farmer')
@section('title','Rice Insurance')
@section('content')
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
</head>
<style>
  /* this is for panel */
  .flip {
    font-size: 16px;
    padding: 10px;
    text-align: center;
    background-color: #198754;
    color: white;
    border: solid 1px #a6d8a8;
    margin: auto;
  }
  
  #panelFarmInfo, #panelBenefiInfo, #btn_submit {
    display: none;
    margin: auto;
  }

  /*this is for google map */
  #location-map {
      height: 400px;
      width: 100%;
    }
    .map-container {
      flex: 1;
      width: 100%;
    }

    .map-container label {
      display: block;
      margin-bottom: 5px;
    }
  </style>
<div class='container-fluid' style="margin: auto">
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
  <form class="form-horizontal" action="/insurance" method="Post">
    @csrf
   <fieldset>
    <!-- 
    <button onclick="javascript:displayfarmsInfo()" class="flip" id="panelbutton">Farmer Information </button>
    <button onclick="toggleBeneficiaries()"  class="flip" id="panelbutton"> Beneficiaries </button>
    -->
    <!-- first panel -->
    <div id="panelFarmInfo">
      <div class="m-3" id='farmInfo'>
        <legend> <strong> Farmer's Information</strong></legend>
            <div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="rsbsa" class="col-lg-12 control-label">RSBSA Reference Number: </label>
                    <div class="col-lg-12">
                      <input type="text" hidden class="form-control" id="rsbsa" value="{{Auth::User()->id}}" name="farmersID">
                      <input type="text" @readonly(true) class="form-control" id="rsbsa" value="{{Auth::User()->rsbsa}}" name="rsbsa">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_fname" class="col-lg-12 control-label">First Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_fname" @readonly(true) value="{{Auth::User()->firstName}}" placeholder="First Name" name="firstName">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_mname" class="col-lg-12 control-label">Middle Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_mname" @readonly(true) value="{{Auth::User()->middleName}}" placeholder="Middle Name" name="middleName">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_lname" class="col-lg-12 control-label">Last Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_lname" @readonly(true) value="{{Auth::User()->lastName}}"placeholder="Last Name" name="lastName">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_extname" class="col-lg-12 control-label">Extension Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_extname"@readonly(true) value="{{Auth::User()->extensionName}}" placeholder="Extension Name" name="extensionName">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="dt_birth" class="col-lg-12 control-label">Birthdate: </label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="dt_birth" @readonly(true) value="{{Auth::User()->birthdate}}" name="birthdate">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sex" class="col-lg-12 control-label">Gender: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="sex" value="{{Auth::User()->sex}}" name="sex" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="civilName" class="col-lg-12 control-label">Civil Status: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="civilName" value="{{Auth::User()->civilName}}" name="civilName" @readonly(true)>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_spouse" class="col-lg-12 control-label">Name of Spouse: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_spouse" @readonly(true) value="{{Auth::User()->spouseName}}" name="spouseName">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_email" class="col-lg-12 control-label">Email: </label>
                    <div class="col-lg-12">
                      <input type="email" class="form-control" id="txt_email" @readonly(true) value="{{Auth::User()->email}}" name="email">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_tel" class="col-lg-12 control-label">Contact Number: </label>
                    <div class="col-lg-12">
                      <input type="tel" class="form-control" id="txt_tel" value="{{Auth::User()->contactNumber}}" name="contactNumber" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="barangayAddress" class="col-lg-12 control-label">Barangay:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="baragangayAddress" value="{{Auth::User()->barangayAddress}}" name="barangayAddress" @readonly(true)>
                    </div>
                  </div>    
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label  class="col-lg-2 control-label">Municipality: </label>
                    <div class="col-lg-12">
                      <input type="text" @readonly(true) class="form-control" value="Tanauan City" name="cityAddress">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label  class="col-lg-2 control-label">Province: </label>
                    <div class="col-lg-12">
                      <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="Batangas" name="provinceAddress">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label  class="col-lg-2 control-label">Region: </label>
                    <div class="col-lg-12">
                      <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="CALABARZON" name="regionAddress">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="isIndigenous" class="col-lg-12 control-label">Members of Indigenous Group:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="isIndigenous" placeholder="Tribe" @readonly(true) value="{{Auth::User()->isIndigenous}}" name="isIndigenous">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ip_tribe" class="col-lg-12 control-label">IP Tribe:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="ip_tribe" placeholder="Tribe" @readonly(true) value="{{Auth::User()->indigenous}}" name="indigenous">
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
    <!-- second panel -->
    <div class="m-3" id="panelBenefiInfo">
      <div id="benefiInfo">
        <legend> <strong>Legal Beneficiary</strong> </legend>
        <br/>
        <div>
          <h5> Legal Beneficiaries 1</h5>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-12 control-label">Beneficiary 's Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_beneficiaries" value="" name="benefi1" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-12 control-label"> Age: </label>
                <div class="col-lg-12">
                  <input type="number" class="form-control" id="txt_age" value="" name="benefi1Age" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_contact" class="col-lg-12 control-label">Relationships:</label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example" name="benefi1Relation" required>
                    <option value="Mother">Mother</option>
                    <option value="Father">Father</option>
                    <option value="Sister">Sister</option>
                    <option value="Brother">Brother</option>
                    <option value="Wife">Wife</option>
                    <option value="Husband">Husband</option>
                    <option value="Daughter">Daughter</option>
                    <option value="Son">Son</option>
                    <option value="Guardian">Guardian</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
            <br/>
          <div>
            <h5> Legal Beneficiaries 2</h5>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_beneficiaries" class="col-lg-12 control-label">Beneficiary 's Name: </label>
                  <div class="col-lg-12">
                    <input type="text"  class="form-control" id="txt_beneficiaries" value="" name="benefi2" required>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_age" class="col-lg-12 control-label"> Age: </label>
                  <div class="col-lg-12">
                    <input type="number" class="form-control" id="txt_age" value="" name="benefi2Age" required>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-lg-12 control-label">Relationships:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example" name="benefi2Relation" required>
                    <option value="Mother">Mother</option>
                      <option value="Father">Father</option>
                      <option value="Sister">Sister</option>
                      <option value="Brother">Brother</option>
                      <option value="Wife">Wife</option>
                      <option value="Husband">Husband</option>
                      <option value="Daughter">Daughter</option>
                      <option value="Son">Son</option>
                      <option value="Guardian">Guardian</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="bankInfo" class="row">
        <legend> <strong>Bank Account Details </strong></legend>
        <div class="col-md-4">
          <div class="form-group">
            <label for="txt_acc_num" class="col-lg-12 control-label">Account Number: </label>
            <div class="col-lg-12">
              <input type="number" class="form-control" id="txt_acc_num" value="{{Auth::User()->bankAccount}}" name="bankAccount" required @readonly(true)>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="txt_bank_name" class="col-lg-12 control-label"> Bank Name: </label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="txt_bank_name" value="{{Auth::User()->bankName}}" name="bankName" required @readonly(true)>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="txt_bank_branch" class="col-lg-12 control-label"> Bank Branch: </label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="txt_bank_branch" value="{{Auth::User()->bankBranch}}" name="bankBranch" required @readonly(true)>
            </div>
          </div>
        </div>
    </div>
    </div>
      
    <!-- third panel -->
    <div class="m-3" id="panelCropInfo"> 
      <!--<div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="txt_insuredID" class="col-lg-6 control-label">Crops Insurance ID:</label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="txt_insuredID" value="">
            </div>
          </div>
        </div>
      </div> -->
      <div id="cropInfo">
        <legend> <strong>Crop Details</strong> </legend>
        <br/>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="insuranceType" class="col-lg-12 control-label">Insurance Type: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="insuranceType" value="Rice" name="insuranceType">
                  <input type="text" @readonly(true) class="form-control" id="status" value="Pending" name="status" hidden>
                </div>
              </div>
            </div><div class="col-md-4">
              <div class="form-group">
                <label for="txt_crops" class="col-lg-2 control-label">Crops: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="txt_crops" value="Rice" name="cropName">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_variety" class="col-lg-2 control-label">Variety :</label>
                <div class="col-lg-12">
                  <input type="text"  class="form-control" id="txt_variety" value="" name="variety" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_contact" class="col-lg-6 control-label">Planting Method:</label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example" name="plantingMethod" required>
                    <option value="Direct Seeding">Direct Seeding</option>
                    <option value="Transplanting">Transplanting</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dateSowing" class="col-lg-6 control-label">Date of Sowing: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="dateSowing" value="" name="dateSowing" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="datePlanted" class="col-lg-6 control-label">Date of Planting: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="datePlanted" value="" name="datePlanted" required> 
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_harvest" class="col-lg-6 control-label">Date of Harvesting: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="txt_harvest" value="" name="dateHarvest" required>
                </div>
              </div>
            </div>
          </div>
          
          <br>
          <div id="farmDeetInfo">
            <legend> <strong>Farm Details</strong> </legend>
            <br/>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="areaInsured" class="col-lg-12 control-label">Area Insured (ha): </label>
                  <div class="col-lg-12">
                    <input type="number" class="form-control" id="areaInsured" name="areaInsured">

                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sitio" class="col-lg-12 control-label">Sitio: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="Sitio" name="sitio">

                  </div>
                </div>
              </div>
                <div class="col-md-4">
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
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="city" class="col-lg-2 control-label">Municipality: </label>
                    <div class="col-lg-12">
                      <input type="text" @readonly(true) class="form-control" id="city" value="Tanauan City" name="cityFarm">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="province" class="col-lg-2 control-label">Province: </label>
                    <div class="col-lg-12">
                      <input type="text" @readonly(true) class="form-control" id="province" value="Batangas" name="provinceFarm">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="province" class="col-lg-2 control-label">Region: </label>
                    <div class="col-lg-12">
                      <input type="text" @readonly(true) class="form-control" id="province" value="CALABARZON" name="regionFarm">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="landCategory" class="col-lg-6 control-label">Land Category:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example" name="landCategory" required>
                      <option value="Irrigated">Irrigated</option>
                      <option value="Rainfed">Rainfed</option>
                      <option value="Upland">Upland</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="soilTypes" class="col-lg-6 control-label">Soil Types:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example" name="soilType" required>
                      <option value="Clay Loam">Clay Loam</option>
                      <option value="Silty Clay Loam">Silty Clay Loam</option>
                      <option value="Silty Loam">Silty Loam</option>
                      <option value="Clay Loam">Sandy Loam</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="topography" class="col-lg-6 control-label">Topography:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example" name="topography" required>
                      <option value="Flat">Flat</option>
                      <option value="Rolling">Rolling</option>
                      <option value="Hilly">Hilly</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="irrigationType" class="col-md-12 control-label">Source of Irrigation:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example" name="irrigationType">
                      <option value="NIA/CIS - National Irrigation Administration">NIA/CIS - National Irrigation Administration</option>
                      <option value="Deepwell">Deepwell</option>
                      <option value="SWIP - Small Water Impounding Project">SWIP - Small Water Impounding Project</option>
                      <option value="STW - Shallow Tube Well">STW - Shallow Tube Well</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tenurialType" class="col-lg-6 control-label">Tenurial Status:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example" name="tenurialType">
                      <option value="Owner">Owner</option>
                      <option value="Lessee">Lessee</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="BoundryInfo">
            <legend> <strong>Boundaries </strong></legend>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="north" class="col-lg-2 control-label">North: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_north" value="" name="north" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="south" class="col-lg-2 control-label"> South: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_south" value="" name="south" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="east" class="col-lg-2 control-label">East: </label>
                  <div class="col-lg-12">
                    <input type="text"  class="form-control" id="txt_east" value="" name="east" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="west" class="col-lg-2 control-label"> West: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_west" value="" name="west" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <!--<label for="location">Location: </label>-->
              <input type="text" id="location" name="location" class="form-control map-input" hidden>
            </div>
          </div>
         <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="location-lat"  class="col-lg-12 control-label">Latitude:</label>
                  <input type="text" id="location-lat" name="location_lat" class="form-control col-lg-12" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <label for="location-long"  class="col-lg-12 control-label">Longitude:</label>
                   <input type="text" id="location-lng" name="location_long" class=" form-control col-lg-12" required>
                  </div>
                 </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="map-container">
                  <label for="location-map"> Map:</label> 
                  <div id="location-map"></div>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-md-6">
                <div class="col-lg-12 d-flex justify-content-end">
                  <div class="row">
                    <div class="col-lg-12">
                      <button class="btn btn-sm btn-success m-2" type="submit" style="width:100%">Submit</button>
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

  <div class="d-flex justify-content-end">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" onclick="javascript:togglePanelFarmInfo()" id="link_farm"> 1  </a></li>
        <li class="page-item"><a class="page-link" onclick="javascript:toggleBeneficiaries()" id="link_benefi">2</a></li>
        <li class="page-item"><a class="page-link" onclick="javascript:toggleCropInfo()" id="link_crop">3</a></li>
        <li class="page-item"><a class="page-link" onclick="javascript:toggleSubmitInfo()"id="link_submit">Submit</a></li>
      </ul>
    </nav>
  </div>
  <script>
    
    // get the panel
    var panelFarmInfo = document.getElementById('panelFarmInfo'); 
    var panelBenefiInfo = document.getElementById('panelBenefiInfo');
    var panelCropInfo = document.getElementById('panelCropInfo');
    var btn_submit = document.getElementById('btn_submit');

    
    //this is to load the Farmer's Info
    window.onload = function() {
      initializeMap();
      panelBenefiInfo.style.display = 'none';
      panelCropInfo.style.display = 'none';
      panelFarmInfo.style.display = 'block';
      document.getElementById("link_prev").disabled = true;
      document.getElementById("link_submit").disabled = true;
    };

    //this function for viewing all the information
    function toggleSubmitInfo() {
      panelBenefiInfo.style.display = 'block';
      panelCropInfo.style.display = 'block';
      panelFarmInfo.style.display = 'block';
      btn_submit.style.display = 'block';


    }
    //this is for farmer's information --1st panel --
    function togglePanelFarmInfo() {
     // get the current value of the panel's display property
      var displaySetting = panelFarmInfo.style.display;
      document.getElementById("btn_submit").display='none';

      // now toggle the panel depending on current state
      if (displaySetting == 'none') {
        // panel is visible. hide it
        panelFarmInfo.style.display = 'block';
        panelBenefiInfo.style.display = 'none';
        panelCropInfo.style.display = 'none';

        //disable other page (remove the comment once we have validation)
        //document.getElementById("link_benefi").disabled = true;

      }
      //else {
        // panel is hidden. show it
        //panelFarmInfo.style.display = 'block';
        //panelBenefiInfo.style.display = 'none';
      //}
    }

    //this is for farmer's beneficiaries --2nd panel --
    function toggleBeneficiaries() {

      // get the current value of the panel's display property
      var displaySetting = panelBenefiInfo.style.display;

      // now toggle the panel depending on current state
      if (displaySetting == 'block') {
        // panel is visible. hide it
        //panelBenefiInfo.style.display = 'none';
      }
      else {
        // panel is hidden. show it
        panelBenefiInfo.style.display = 'block';
        panelFarmInfo.style.display = 'none';
        panelCropInfo.style.display = 'none';

        //disable other page (remove the comment once we have validation)
        //document.getElementById("link_farm").disabled = true;
      }
    }
    function getLocation(field) {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function (position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Reverse geocoding using OpenStreetMap Nominatim API
            const geocodingUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

            fetch(geocodingUrl)
              .then(response => response.json())
              .then(data => {
                const address = data.display_name;
                document.getElementById(field).value = address;
                document.getElementById(`${field}-lat`).value = latitude;
                document.getElementById(`${field}-lng`).value = longitude;
              })
              .catch(error => {
                console.log('Error getting address:', error);
              });
          },
          function (error) {
            console.log('Error getting GPS coordinates:', error);
          }
        );
      } else {
        console.log('Geolocation is not supported by this browser.');
      }
    } 

    function initializeMap() {
      const map = L.map('location-map').setView([13.9416, 121.1182], 12);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(map);

      map.on('click', function (e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;
        document.getElementById('location-lat').value = lat;
        document.getElementById('location-lng').value = lng;

        // Reverse geocoding using OpenStreetMap Nominatim API
        const geocodingUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;

        fetch(geocodingUrl)
          .then(response => response.json())
          .then(data => {
            const address = data.display_name;
            document.getElementById('location').value = address;
          })
          .catch(error => {
            console.log('Error getting address:', error);
          });
      });
    }
    //this is for crops details --4th panel --
    
    function toggleCropInfo() {

      // get the current value of the panel's display property
      var displaySetting = panelCropInfo.style.display;

      // now toggle the panel depending on current state
      if (displaySetting == 'block') {
        // panel is visible. hide it
        //panelCropInfo.style.display = 'none';
      }
      else {
        // panel is hidden. show it
        panelCropInfo.style.display = 'block';
        btn_submit.style.display = 'none';
        panelFarmInfo.style.display = 'none';
        panelBenefiInfo.style.display = 'none';
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