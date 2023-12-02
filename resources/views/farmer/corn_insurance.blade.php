@extends('layouts.master_farmer')
@section('title','Corn Insurance')
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
  
  #panelFarmInfo, #panelBenefiInfo {
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
  <form class="form-horizontal">
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
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-2 control-label">Farmer's ID: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="txt_farmersID" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_fname" class="col-lg-2 control-label">First Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_fname" placeholder="First Name">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_mname" class="col-lg-2 control-label">Middle Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_mname" placeholder="Middle Name">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_lname" class="col-lg-2 control-label">Last Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_lname" placeholder="Last Name">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_extname" class="col-lg-2 control-label">Extension Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_extname" placeholder="Extension Name">
                </div>
              </div>
              <div class="form-group">
                <label for="dt_birth" class="col-lg-2 control-label">Birthdate: </label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="dt_birth" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_gender" class="col-lg-2 control-label">Gender: </label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select Gender </option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Others</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="txt_civil" class="col-lg-2 control-label">Civil Status: </label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select Civil Status</option>
                    <option value="1">Single</option>
                    <option value="2">Married</option>
                    <option value="3">Separated</option>
                    <option value="4">Widowed</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="txt_spouse" class="col-lg-2 control-label">Name of Spouse: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_spouse" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_email" class="col-lg-2 control-label">Email: </label>
                <div class="col-lg-12">
                  <input type="email" class="form-control" id="txt_email" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_tel" class="col-lg-2 control-label">Contact Number: </label>
                <div class="col-lg-12">
                  <input type="tel" class="form-control" id="txt_tel" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Barangay</option>
                    <option value="1">None</option>
                  </select>
                </div>
              </div>    
              <div class="form-group">
                <label for="ip_tribe" class="col-lg-2 control-label">IP Tribe:</label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="ip_tribe" placeholder="Tribe">
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
          <div class="form-group">
            <label for="txt_farmersID" class="col-lg-12 control-label">Beneficiary 's Name: </label>
            <div class="col-lg-12">
              <input type="text" class="form-control" id="txt_beneficiaries" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="txt_farmersID" class="col-lg-2 control-label"> Age: </label>
            <div class="col-lg-12">
              <input type="number" class="form-control" id="txt_age" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="txt_contact" class="col-lg-2 control-label">Relationships:</label>
            <div class="col-lg-12">
              <select class="form-select" aria-label="Default select example">
                <option selected>Relationships</option>
                <option value="1">Mother</option>
                <option value="2">Father</option>
                <option value="3">Sister</option>
                <option value="4">Brother</option>
                <option value="5">Wife</option>
                <option value="6">Husband</option>
                <option value="7">Daugther</option>
                <option value="8">Son</option>
                <option value="9">Guardian</option>
              </select>
            </div>
          </div>
            <br/>
          <div>
            <h5> Legal Beneficiaries 2</h5>
            <div class="form-group">
              <label for="txt_farmersID" class="col-lg-12 control-label">Beneficiary 's Name: </label>
              <div class="col-lg-12">
                <input type="text"  class="form-control" id="txt_beneficiaries" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_farmersID" class="col-lg-2 control-label"> Age: </label>
              <div class="col-lg-12">
                <input type="number" class="form-control" id="txt_age" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="txt_contact" class="col-lg-2 control-label">Relationships:</label>
              <div class="col-lg-12">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Relationships</option>
                  <option value="1">Mother</option>
                  <option value="2">Father</option>
                  <option value="3">Sister</option>
                  <option value="4">Brother</option>
                  <option value="5">Wife</option>
                  <option value="6">Husband</option>
                  <option value="7">Daugther</option>
                  <option value="8">Son</option>
                  <option value="9">Guardian</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="bankInfo">
        <legend> <strong>Bank Account Details </strong></legend>
        <div class="form-group">
          <label for="txt_farmersID" class="col-lg-2 control-label">Account Number: </label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="txt_acc_num" value="">
          </div>
        </div>
        <div class="form-group">
          <label for="txt_farmersID" class="col-lg-2 control-label"> Bank Branch: </label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="txt_bank_branch" value="">
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
                <label for="txt_farmersID" class="col-lg-2 control-label">Crops: </label>
                <div class="col-lg-12">
                  <input type="text" @@readonly(true) class="form-control" id="txt_crops" value="Corn">
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
            <div class="row">
              <div class="col-md-12">
                <div class="map-container">
                  <label for="location-map"> Map:</label> 
                  <div id="location-map"></div>
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
        <li class="page-item"><a class="page-link" onclick="#" id="link_prev"> Previous  </a></li>
        <li class="page-item"><a class="page-link" onclick="javascript:togglePanelFarmInfo()" id="link_farm"> 1  </a></li>
        <li class="page-item"><a class="page-link" onclick="javascript:toggleBeneficiaries()" id="link_benefi">2</a></li>
        <li class="page-item"><a class="page-link" onclick="javascript:toggleCropInfo()" id="link_crop">3</a></li>
        <li class="page-item"><a class="page-link" href="#" id="link_submit">Submit</a></li>
      </ul>
    </nav>
  </div>
  <script>
    
    // get the panel
    var panelFarmInfo = document.getElementById('panelFarmInfo'); 
    var panelBenefiInfo = document.getElementById('panelBenefiInfo');
    var panelCropInfo = document.getElementById('panelCropInfo');

    
    //this is to load the Farmer's Info
    window.onload = function() {
      panelBenefiInfo.style.display = 'none';
      initializeMap();
      panelCropInfo.style.display = 'none';
      panelFarmInfo.style.display = 'block';
      document.getElementById("link_prev").disabled = true;
      document.getElementById("link_submit").disabled = true;
    };
    //this is for farmer's information --1st panel --
    function togglePanelFarmInfo() {
     // get the current value of the panel's display property
      var displaySetting = panelFarmInfo.style.display;


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
        panelFarmInfo.style.display = 'none';
        panelBenefiInfo.style.display = 'none';
      }
    }
  </script>
</div>
@endsection