@extends('layouts.master_farmer')
@section('title','Farm')
@section('content')
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
<form class="form-horizontal" method="POST" action="{{route('farm.update', ['farm'=>$farms])}}" >
 <fieldset>
 @csrf
 @method('put')
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
                <input type="text" @readonly(true) class="form-control" id="firstName" value="{{$farms->firstName}}" name="firstName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="middleName" class="col-lg-12 control-label">Middle Name: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="middleName" value="{{$farms->middleName}}" name="middleName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="lastName" class="col-lg-12 control-label">Last Name: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="lastName" value="{{$farms->lastName}}" name="lastName">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="extensionName" class="col-lg-12 control-label">Extension Name: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="extensionName" value="{{$farms->extensionName}}" name="extensionName">
              </div>
            </div>
          </div>
        </div>
      <h5 class="mx-2"> Farm Details</h5>
      <div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="txt_farmersID" class="col-lg-12 control-label">Sitio: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_city_farm" value="{{$farms->sitio}}" name="sitio">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="txt_contact" class="col-lg-2 control-label">Barangay:</label>
              <div class="col-lg-12">
                <select class="form-select" aria-label="Default select example" name="barangayFarm" name="barangayFarm" required>
                  <option selected> {{$farms->barangayFarm}}</option>
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
            <label for="txt_farmersID" class="col-lg-2 control-label">Municipality/City: </label>
            <div class="col-lg-12">
              <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="Tanauan City" name="cityFarm">
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_farmersID" class="col-lg-2 control-label">Province: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="Batangas" name="provinceFarm">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="txt_farmersID" class="col-lg-2 control-label">Region: </label>
              <div class="col-lg-12">
                <input type="text" @readonly(true) class="form-control" id="txt_city_farm" value="CALABARZON" name="regionFarm">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label for="txt_farmersID" class="col-lg-6 control-label">Farm Area (ha): </label>
                <div class="col-lg-12">
                  <input type="number" class="form-control" id="txt_farm_size" value="{{$farms->farmArea}}" name="farmArea">
                </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_contact" class="col-lg-2 control-label">Farm Type:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example"  id="dd_farm_type" name="farmType">
                      <option selected> {{$farms->farmType}}</option>
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
                  <label for="txt_contact" class="col-lg-6 control-label">Ownership Document Type:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example"  id="dd_doc_type" name="ownershipDocument">
                      <option selected> {{$farms->ownershipDocument}}</option>
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
                    <option selected>{{$farms->ownershipType}}</option>
                      <option value="Registered Owner">Registered Owner</option>
                      <option value="Tenant">Tenant</option>
                      <option value="Lesse">Lesse</option>
                  </select>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_farmersID" class="col-lg-6 control-label">Name of the Owner: </label>
                  <div class="col-lg-12">
                      <input type="text" class="form-control" id="txt_land_owner" value="{{$farms->ownerName}}" name="ownerName">
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_contact" class="col-lg-12 scontrol-label">Owned/Lessed since:</label>
                <div class="col-lg-12">
                  <input type="date" class="form-control" id="txt_land_owner"  value="{{$farms->ownDateFrom}}"name="ownDateFrom">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="txt_farmersID" class="col-lg-12 control-label">Owned/Lessed until: </label>
                <div class="col-lg-12">
                    <input type="date" class="form-control" id="txt_land_owner"  value="{{$farms->ownDateTo}}" name="ownDateTo">
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
                  <label for="txt_contact" class="col-lg-6 control-label">Within Ancestral Domain:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example"  id="dd_ancestral_domain" name="withinAncestralDomain">
                      <option selected>{{$farms->withinAncestralDomain}}</option>
                      <option value="Yes">Yes</option>
                      <option value="No"> No </option>
                    </select>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="txt_contact" class="col-lg-6 control-label">Agrarian Reform Beneficiary:</label>
                  <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example"  id="dd_ancestral_benefi" name="isAgraReformBenefi">
                      <option selected>{{$farms->isAgraReformBenefi}}</option>
                      <option value="Yes">Yes</option>
                      <option value="No"> No </option>
                    </select>
                  </div>
              </div>
          </div>
        </div>
        
    </div>
    <div class="row justify-content-end">
      <div class="col-md-2">
        <div class="col-lg-12 d-flex justify-content-end">
          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-sm btn-success m-2" type="submit" style="width:100%">Update</button>
            </fieldset>
          </form>
            </div>
            <div class="col-md-6">
              <button class="btn btn-sm btn-success m-2" href="{{ URL::previous() }}" style="width:100%">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>

<script>
$(document).keypress(
  function(event){
      if (event.which == '13') {
      event.preventDefault();
      }
  });
</script>
@endsection

