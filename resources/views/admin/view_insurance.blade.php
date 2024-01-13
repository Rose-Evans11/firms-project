@extends('layouts.master_admin')
@section('title','View Insurance')
@section('content')
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
</head>
<style>
  /* this is for panel 
  .flip {
    font-size: 16px;
    padding: 10px;
    text-align: center;
    background-color: #198754;
    color: white;
    border: solid 1px #a6d8a8;
    margin: auto;
  } */
  /*
  #panelFarmInfo, #panelBenefiInfo, #btn_submit {
    display: none;
    margin: auto;
  } */

  /*this is for google map 
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
    } */
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
  <form class="form-horizontal">
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
                      <input type="text" hidden class="form-control" id="rsbsa" value="{{$insurances->id}}" name="farmersID">
                      <input type="text" @readonly(true) class="form-control" id="rsbsa" value="{{$insurances->rsbsa}}" name="rsbsa">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="rsbsa" class="col-lg-12 control-label">Farmer's ID: </label>
                    <div class="col-lg-12">
                      <input type="text" @readonly(true) class="form-control" id="rsbsa" value="{{$insurances->farmersID}}" name="farmersID">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_fname" class="col-lg-12 control-label">First Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_fname" @readonly(true) value="{{$insurances->firstName}}" placeholder="First Name" name="firstName">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_mname" class="col-lg-12 control-label">Middle Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_mname" @readonly(true) value="{{$insurances->middleName}}" placeholder="Middle Name" name="middleName">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_lname" class="col-lg-12 control-label">Last Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_lname" @readonly(true) value="{{$insurances->lastName}}"placeholder="Last Name" name="lastName">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_extname" class="col-lg-12 control-label">Extension Name: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_extname"@readonly(true) value="{{$insurances->extensionName}}" placeholder="Extension Name" name="extensionName">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="dt_birth" class="col-lg-12 control-label">Birthdate: </label>
                    <div class="col-lg-12">
                      <input type="date" class="form-control" id="dt_birth" @readonly(true) value="{{$insurances->birthdate}}" name="birthdate">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sex" class="col-lg-12 control-label">Gender: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="sex" value="{{$insurances->sex}}" name="sex" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="civilName" class="col-lg-12 control-label">Civil Status: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="civilName" value="{{$insurances->civilName}}" name="civilName" @readonly(true)>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_spouse" class="col-lg-12 control-label">Name of Spouse: </label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_spouse" @readonly(true) value="{{$insurances->spouseName}}" name="spouseName">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_email" class="col-lg-12 control-label">Email: </label>
                    <div class="col-lg-12">
                      <input type="email" class="form-control" id="txt_email" @readonly(true) value="{{$insurances->email}}" name="email">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="txt_tel" class="col-lg-12 control-label">Contact Number: </label>
                    <div class="col-lg-12">
                      <input type="tel" class="form-control" id="txt_tel" value="{{$insurances->contactNumber}}" name="contactNumber" @readonly(true)>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="barangayAddress" class="col-lg-12 control-label">Barangay:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="baragangayAddress" value="{{$insurances->barangayAddress}}" name="barangayAddress" @readonly(true)>
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
                      <input type="text" @readonly(true) class="form-control" id="txt_sitio" value="IV-A" name="regionAddress">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="isIndigenous" class="col-lg-12 control-label">Members of Indigenous Group:</label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="isIndigenous" placeholder="Tribe" @readonly(true) value="{{$insurances->isIndigenous}}" name="isIndigenous">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ip_tribe" class="col-lg-12 control-label">IP Tribe:</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" id="ip_tribe" placeholder="Tribe" @readonly(true) value="{{$insurances->indigenous}}" name="indigenous">
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
                  <input type="text" class="form-control" id="txt_beneficiaries" value="{{$insurances->benefi1}}" name="benefi1" required @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-12 control-label"> Age: </label>
                <div class="col-lg-12">
                  <input type="number" class="form-control" id="txt_age" value="{{$insurances->benefi1Age}}" name="benefi1Age" required @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_contact" class="col-lg-12 control-label">Relationships:</label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="benefi1Relation" value="{{$insurances->benefi1Relation}}" name="benefi1Relation" required @readonly(true)>
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
                    <input type="text"  class="form-control" id="txt_beneficiaries" value="{{$insurances->benefi2}}" name="benefi2" required @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="txt_age" class="col-lg-12 control-label"> Age: </label>
                  <div class="col-lg-12">
                    <input type="number" class="form-control" id="txt_age" value="{{$insurances->benefi2Age}}" name="benefi2Age" required @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-lg-12 control-label">Relationships:</label>
                  <div class="col-lg-12">
                  <input type="text" class="form-control" id="benefi2Relation" value="{{$insurances->benefi2Relation}}" name="benefi2Relation" required @readonly(true)>
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
                <input type="text" class="form-control" id="txt_acc_num" value="{{$insurances->bankAccount}}" name="bankAccount" required @readonly(true)>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="txt_bank_name" class="col-lg-12 control-label"> Bank Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_bank_name" value="{{$insurances->bankName}}" name="bankName" required @readonly(true)>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="txt_bank_branch" class="col-lg-12 control-label"> Bank Branch: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_bank_branch" value="{{$insurances->bankBranch}}" name="bankBranch" required @readonly(true)>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- third panel -->
    <div class="m-3" id="panelCropInfo"> 
      <div id="cropInfo">
        <legend> <strong>Crop Details</strong> </legend>
        <br/>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_insuredID" class="col-lg-6 control-label">Crops Insurance ID:</label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_insuredID" value="{{$insurances->id}}" @readonly(true)>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="policyNumber" class="col-lg-6 control-label">Policy Number:</label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="policyNumber" value="{{$insurances->policyNumber}}" @required(true) name="policyNumber">
              </div>
            </div>
          </div>
        </div> 
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="insuranceType" class="col-lg-12 control-label">Insurance Type: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="insuranceType" value="{{$insurances->insuranceType}}" name="insuranceType">
                </div>
              </div>
            </div><div class="col-md-4">
              <div class="form-group">
                <label for="txt_crops" class="col-lg-2 control-label">Crops: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="cropName" value="{{$insurances->cropName}}" name="cropName">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_variety" class="col-lg-2 control-label">Variety :</label>
                <div class="col-lg-12">
                  <input type="text"  class="form-control" id="txt_variety" value="{{$insurances->variety}}" name="variety" required  @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_contact" class="col-lg-6 control-label">Planting Method:</label>
                <div class="col-lg-12">
                  <input type="text"  class="form-control" id="plantingMethod" value="{{$insurances->plantingMethod}}" name="plantingMethod" required  @readonly(true)>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dateSowing" class="col-lg-6 control-label">Date of Sowing: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="dateSowing" value="{{$insurances->dateSowing}}" name="dateSowing" required @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="datePlanted" class="col-lg-6 control-label">Date of Planting: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="datePlanted" value="{{$insurances->datePlanted}}" name="datePlanted" required @readonly(true)> 
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_harvest" class="col-lg-6 control-label">Date of Harvesting: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="txt_harvest" value="{{$insurances->dateHarvest}}" name="dateHarvest" required @readonly(true)>
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
                  <label for="areaInsured" class="col-lg-12 control-label">Area Insured (ha): </label>
                  <div class="col-lg-12">
                    <input type="number" class="form-control" id="areaInsured" name="areaInsured" value="{{$insurances->areaInsured}}" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="barangay" class="col-lg-2 control-label">Barangay:</label>
                  <div class="col-lg-12">
                  <input type="text" class="form-control" id="barangayFarm" value="{{$insurances->barangayFarm}}" name="barangayFarm" required @readonly(true)>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="city" class="col-lg-2 control-label">Municipality: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="city" value="Tanauan City" name="cityFarm">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="province" class="col-lg-2 control-label">Province: </label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="province" value="Batangas" name="provinceFarm">
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="landCategory" class="col-lg-6 control-label">Land Category:</label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="landCategory" value="{{$insurances->landCategory}}" name="landCategory">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="soilTypes" class="col-lg-6 control-label">Soil Types:</label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="soilType" value="{{$insurances->soilType}}" name="soilType">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-2 control-label">Soil pH:</label>
                    <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="phLevel" value="{{$insurances->phLevel}}" name="phLevel">
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="topography" class="col-lg-6 control-label">Topography:</label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="topography" value="{{$insurances->topography}}" name="topography">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="irrigationType" class="col-md-12 control-label">Source of Irrigation:</label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="irrigationType" value="{{$insurances->irrigationType}}" name="irrigationType">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="tenurialType" class="col-lg-6 control-label">Tenurial Status:</label>
                  <div class="col-lg-12">
                    <input type="text" @readonly(true) class="form-control" id="tenurialType" value="{{$insurances->tenurialType}}" name="tenurialType">
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
                    <input type="text" class="form-control" id="txt_north" value="{{$insurances->north}}" name="north" required @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="south" class="col-lg-2 control-label"> South: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_south" value="{{$insurances->south}}" name="south" required @readonly(true)>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="east" class="col-lg-2 control-label">East: </label>
                  <div class="col-lg-12">
                    <input type="text"  class="form-control" id="txt_east" value="{{$insurances->east}}" name="east" required @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="west" class="col-lg-2 control-label"> West: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_west" value="{{$insurances->west}}" name="west" required @readonly(true)>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="location-lat"  class="col-lg-12 control-label">Latitude:</label>
                  <input type="text" id="location-lat" name="location_lat" class="form-control col-lg-12" required value="{{$insurances->location_lat}}" @readonly(true)>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <label for="location-long"  class="col-lg-12 control-label">Longitude:</label>
                   <input type="text" id="location-lng" name="location_long" class=" form-control col-lg-12" required value="{{$insurances->location_long}}" @readonly(true)>
                  </div>
                 </div>
          </div>
          <br/>
          @if ($insurances->status== 'Approved')
            <div>
              <legend> <strong> Additional Information </strong></legend>
              <div class="row">
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label for="cicNumber"  class="col-lg-12 control-label">CIC Number:</label>
                    <input type="text" id="cicNumber" name="cicNumber" class=" form-control col-lg-12" required value="{{$insurances->cicNumber}}" @readonly(true)>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cicdateIssued"  class="col-lg-12 control-label">Date Issued:</label>
                    <input type="date" id="cicdateIssued" name="cicdateIssued" class=" form-control col-lg-12" required value="{{$insurances->cicdateIssued}}" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label for="cocNumber"  class="col-lg-12 control-label">COC Number:</label>
                    <input type="text" id="cocNumber" name="cocNumber" class=" form-control col-lg-12" required value="{{$insurances->cocNumber}}" @readonly(true)>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cocdateIssued"  class="col-lg-12 control-label">Date Issued:</label>
                    <input type="date" id="cocdateIssued" name="cocdateIssued" class=" form-control col-lg-12" required value="{{$insurances->cocdateIssued}}" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="cocNumber"  class="col-lg-12 control-label"> <strong> Period of Cover: </strong></label>
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label for="from"  class="col-lg-12 control-label">From:</label>
                    <input type="date" id="coverFrom" name="coverFrom" class=" form-control col-lg-12" required value="{{$insurances->coverFrom}}" @readonly(true)>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="to"  class="col-lg-12 control-label">To:</label>
                    <input type="date" id="coverTo" name="coverTo" class=" form-control col-lg-12" required value="{{$insurances->coverTo}}" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="cocNumber"  class="col-lg-12 control-label"> <strong> </strong></label>
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label for="dateSign"  class="col-lg-12 control-label">Date (Signed):</label>
                    <input type="date" id="dateSign" name="dateSign" class=" form-control col-lg-12" required value="{{$insurances->dateSign}}" @readonly(true)>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="signBy"  class="col-lg-12 control-label">Issued and Sign by:</label>
                    <input type="text" id="signBy" name="signBy" class=" form-control col-lg-12" required value="{{$insurances->signBy}}" @readonly(true)>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-end mt-2">
              <div class="col-md-6">
                <div class="col-lg-12 d-flex justify-content-end">
                 <a href="{{ URL::previous() }}" style="text-decoration: none; color:white" class="btn btn-success" style="width: 100%"> Back</a></Button>
                </div>
              </div>
            </div> 
          @elseif($insurances->status== 'Rejected')
          <div>
            <legend> <strong> Additional Information</strong></legend>
            <div class="row">
               <div class="col-md-6"> 
                <div class="form-group">
                  <label for="status"  class="col-lg-12 control-label">Status:</label>
                  <input type="text" id="status" name="status" class=" form-control col-lg-12" required value="{{$insurances->status}}" @readonly(true)>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="statusName"  class="col-lg-12 control-label">Comment:</label>
                  <input type="text" id="statusName" name="statusNote" class=" form-control col-lg-12" required value="{{$insurances->statusNote}}" @readonly(true)>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-end mt-2">
              <div class="col-md-6">
                <div class="col-lg-12 d-flex justify-content-end">
                 <a href="{{ URL::previous() }}" style="text-decoration: none; color:white" class="btn btn-success" style="width: 100%"> Back</a></Button>
                </div>
              </div>
            </div> 
            @elseif($insurances->status== 'Partially Rejected')
            <div>
              <legend> <strong> Additional Information</strong></legend>
              <div class="row">
                 <div class="col-md-6"> 
                  <div class="form-group">
                    <label for="status"  class="col-lg-12 control-label">Status:</label>
                    <input type="text" id="status" name="status" class=" form-control col-lg-12" required value="{{$insurances->status}}" @readonly(true)>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="statusName"  class="col-lg-12 control-label">Comment:</label>
                    <input type="text" id="statusName" name="statusName" class=" form-control col-lg-12" required value="{{$insurances->statusName}}" @readonly(true)>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"> 
                  <div class="form-group">
                    <label for="requestLetter"  class="col-lg-12 control-label">Request Letter:</label>
                    <textarea id="requestLetter" name="requestLetter" class=" form-control col-lg-12" required @readonly(true)> {{$insurances->requestLetter}}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-end mt-2">
                <div class="col-md-6">
                  <div class="col-lg-12 d-flex justify-content-end">
                   <a href="{{ URL::previous() }}" style="text-decoration: none; color:white" class="btn btn-success" style="width: 100%"> Back</a></Button>
                  </div>
                </div>
            </div> 
          @else
          <!-- pending-->
          <div class="row justify-content-end mt-2">
            <div class="col-md-6">
              <div class="col-lg-12 d-flex justify-content-end">
               <a href="{{ URL::previous() }}" style="text-decoration: none; color:white" class="btn btn-success" style="width: 100%"> Back</a></Button>
              </div>
            </div>
          </div> 
          @endif
            <!--
            <div class="row">
              <div class="col-md-12">
                <div class="map-container">
                  <label for="location-map"> Map:</label> 
                  <div id="location-map"></div>
              </div>
            </div>
          -->
             
          <br/>
      </div>
    </div>
  </fieldset>
</form> 
</div>
@endsection