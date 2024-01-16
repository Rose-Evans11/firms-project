@extends('layouts.master_farmer')
@section('title','Farm List')
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
  <div class="table-wrapper" style=" width:100%; overflow-x:scroll">  
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Farm ID</th>
                  <th>Farm Area</th>
                  <th>Farm Location</th>
                  <th>Ownership Type </th>
                  <th>Owner Name</th>
                  <th>Ownership Document</th>
                  <th>Farm Type</th>
                  <th>Edit</th>
              </tr>
          </thead>
          <tbody>
            @if(count($farms) > 0)
            @foreach ($farms as $farm)
            <tr>
             <td>{{$farm->id}} </td>
             <td>{{$farm->farmArea}}</td>
             <td>{{$farm->barangayFarm}}</td>
             <td>{{$farm->ownershipType}}</td>
             <td>{{$farm->ownerName}}</td>
             <td>{{$farm->ownershipDocument}}</td>
             <td>{{$farm->farmType}}</td>
             <td><a href="{{route('farm.edit', ['farm'=>$farm->id])}}" style="width:100%; text-decoration:none"> Edit</a></td>
            </tr>
            @endforeach
            @else
             <tr><td>No result found!</td></tr>
            @endif
          </tbody>
      </table>
      </div>
</div>
  </div>
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
  <form class="form-horizontal" method="POST" action="/farm">
   <fieldset>
   @csrf
    <div class="m-3" id="panelfarmList">
      <div id="farmDeetInfo">
        <legend> <strong>Farm Land Description</strong> </legend>
        <br/>
        <h5> Farm Parcel</h5>
        <h5 class="mx-2"> Farmer's Details</h5>
        <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="{{Auth::User()->id}}" name="farmersID" hidden>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="firstName" class="col-lg-12 control-label">First Name: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="firstName" value="{{Auth::User()->firstName}}" name="firstName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="middleName" class="col-lg-12 control-label">Middle Name: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="middleName" value="{{Auth::User()->middleName}}" name="middleName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="lastName" class="col-lg-12 control-label">Last Name: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="lastName" value="{{Auth::User()->lastName}}" name="lastName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="extensionName" class="col-lg-12 control-label">Extension Name: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="extensionName" value="{{Auth::User()->extensionName}}" name="extensionName">
              </div>
            </div>
          </div>
        </div>
        <h5 class="mx-2"> Farm Details</h5>
        <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="{{Auth::User()->id}}" name="farmersID" hidden>
        <div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-2 control-label">Sitio: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_city_farm" value="" name="sitio">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_contact" class="col-lg-12 control-label">Barangay:</label>
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
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-12 control-label">Municipality/City: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="Tanauan City" name="cityFarm">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-12 control-label">Province: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="Batangas" name="provinceFarm">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-12 control-label">Region: </label>
                <div class="col-lg-12">
                  <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="CALABARZON" name="regionFarm">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-12 control-label">Farm Area (ha): </label>
                  <div class="col-lg-12">
                    <input type="number" class="form-control" id="txt_farm_size" value="" name="farmArea">
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-12 control-label">Farm Type:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_farm_type" name="farmType">
                        <option value="Irrigated">Irrigated</option>
                        <option value="Rainfed Upland">Rainfed Upland</option>
                        <option value="Rainfed Lowland">Rainfed Lowland</option>
                      </select>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div id="farmOwningInfo">
        <h5 class="mx-2"> Ownership Information</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-12 control-label">Ownership Document Type:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_doc_type" name="ownershipDocument">
                        <option value="Certificate of Land Transfer">Certificate of Land Transfer</option>
                        <option value="Emancipation Patent">Emancipation Patent</option>
                        <option value="Individual Certificate of Land Ownership Award (CLOA)">Individual Certificate of Land Ownership Award (CLOA)</option>
                        <option value="Collective CLOA">Collective CLOA</option>
                        <option value="Co-Ownership CLOA">Co-Ownership CLOA</option>
                        <option value="Agricultural Sales Patent">Agricultural Sales Patent</option>
                        <option value="Homestead Patent">Homestead Patent</option>
                        <option value="Free Patent">Free Patent</option>
                        <option value="Certificate/Regular Title">Certificate/Regular Title</option>
                        <option value="Certificate of Ancestral Domain Title">Certificate of Ancestral Domain Title</option>
                        <option value="Certificate of Ancestral Land Title">Certificate of Ancestral Land Title</option>
                        <option value="Tax Declaration">Tax Declaration</option>
                        <option value="Barangay Certification">Barangay Certification</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 control-label">Document :</label>
                    <div class="col-lg-12">
                      <input type="file" placeholder="Choose File"  id="file_document" name="ownershipDocumentFile">
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-6 scontrol-label">Ownership Type:</label>
                    <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example"  id="dd_own_type" name="ownershipType">
                        <option value="Registered Owner">Registered Owner</option>
                        <option value="Tenant">Tenant</option>
                        <option value="Lesse">Lesse</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_farmersID" class="col-lg-12 control-label">Name of the Owner: </label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_land_owner" value="" name="ownerName">
                    </div>
                </div>
            </div>
         </div>
         <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_contact" class="col-lg-12 scontrol-label">Owned/Lessed since:</label>
                  <div class="col-lg-12">
                    <input type="date" class="form-control" id="txt_land_owner" value="" name="ownDateFrom">
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-12 control-label">Owned/Lessed until: </label>
                  <div class="col-lg-12">
                      <input type="date" class="form-control" id="txt_land_owner" value="" name="ownDateTo">
                  </div>
              </div>
          </div>
       </div>
      </div>
      <div id="farmOther">
        <br>
        <h5 class="mx-2"> Other Details</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-12 control-label">Within Ancestral Domain:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_ancestral_domain" name="withinAncestralDomain">
                        <option value="Yes">Yes</option>
                        <option value="No"> No </option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_contact" class="col-lg-12 control-label">Agrarian Reform Beneficiary:</label>
                    <div class="col-lg-12">
                      <select class="form-select" aria-label="Default select example"  id="dd_ancestral_benefi" name="isAgraReformBenefi">
                        <option value="Yes">Yes</option>
                        <option value="No"> No </option>
                      </select>
                    </div>
                </div>
            </div>
          </div>
          
      </div>
      <div class="row justify-content-end">
        <div class="col-md-6">
          <div class="col-lg-12 d-flex justify-content-end">
            <div class="row">
              <div class="col-lg-12">
                <button class="btn btn-sm btn-success m-2" type="submit" style="width:100%">Add</button>
              </div>
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