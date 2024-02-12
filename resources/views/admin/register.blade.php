@extends('layouts.master_admin')
@section('title','Register')
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
  #txt_age, #txt_active{
    display: none;
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
  {{Session::get('success')}}
  <form action="{{ route('farmer.find') }}" method="GET"> 
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div class="row">
            <div class="col-lg-2 mt-1">
              <label for="txt_RSBSA" class="control-label"> <h4> Search: </h4> </label>
            </div>
            <div class="col-lg-5 mt-1">
              <input type="text" class="form-control" placeholder="Search here....." name="query" value="{{ request()->input('query') }}" minlength="2" style="width:100%">
              <span class="text-danger">@error('query'){{ $message }} @enderror</span>
            </div>
            <div class="col-lg-2 mt-1">
              <div class="form-group">
                <button type="submit" class="btn btn-success" style="width:100%">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-lg-2">
            <div class="form-group">
              <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/user/excel/') }}">Excel</a>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="form-group">
              <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/user/csv/') }}">CSV</a>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="form-group">
              <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/user/pdf/') }}">PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-wrapper" style=" width:100%; overflow-x:scroll">
        @if(isset($users))
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>Farmer's ID</th>
                    <th>RSBSA</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Extension Name</th>
                    <th>Active</th>
                    <th>Image Photo </th>
                    <th>Valid ID  </th>
                    <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}} </td>
                            <td>{{$user->rsbsa}}</td>
                            <td>{{$user->firstName}}</td>
                            <td>{{$user->middleName}}</td>
                            <td>{{$user->lastName}}</td>
                            <td>{{$user->extensionName}}</td>
                            <td>
                              <img src="{{source_path('valid_id_image_location/' . $user->photo)}}" alt="Valid ID Image">
                            </td>
                            <td>                              
                              <img src="{{source_path('profile_image_location/' . $user->validIDPhoto)}}" alt="Profile Image">
                            </td>
                            <td>{{$user->isActive}}</td>
                            <td> <a href="{{route('farmer.edit', ['user'=>$user])}}"> Edit</a></td>
                        </tr>
                        @endforeach
                    @else

                    <tr>
                        <td colspan="8">No result found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="pagination-block">
                <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
                {{  $users->appends(request()->input())->links('layouts.paginationlinks') }}
            </div>
        @endif
      </div>
    </div>
  
    <!-- this is for adding farmer -->
  <form class="form-horizontal" action="/register" method="POST" enctype="multipart/form-data">
    @csrf
   <fieldset>
    <div class="m-3" id="panelfarmList">
      <div id="farmDeetInfo">
        <legend> <strong>Add new Farmer</strong> </legend>
        <br/>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="txt_RSBSA" class="col-lg-12 control-label">RSBSA Number: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_RSBSA"  placeholder="RSBSA" name="rsbsa" value="{{ old('rsbsa') }}" required maxlength="19" minlength="19">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="dd_barangay" class="col-lg-2 control-label">Barangay:</label>
                  <div class="col-lg-12">
                    <select class="form-select"  aria-label="Default select example" required name="barangayAddress">
                      <option value="{{ old('barangayAddress') }}" selected>{{ old('barangayAddress') }}</option>
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
          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                  <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_fname" value="{{ old('firstName') }}" placeholder="First Name" name="firstName" required>
                  </div>
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_mname" value="{{ old('middleName') }}" placeholder="Middle Name" name="middleName">
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
              <label for="txt_lname" class="col-lg-6 control-label">Last Name: </label>
              <div class="col-lg-12">
                <input type="text" class="form-control" id="txt_lname" value="{{ old('lastName') }}" placeholder="Last Name" name="lastName" required>
              </div>
            </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_ext" class="col-lg-6 control-label">Extension Name: </label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" id="txt_ext" value="{{ old('firstName') }}" placeholder="Extension Name" name="extensionName">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="dt_birth" class="col-lg-6 control-label">Birthdate: </label>
                <div class="col-lg-12">
                  <input type="date"  max="9999-12-31" class="form-control" id="dt_birth" value="{{ old('birthdate') }}" name="birthdate" required onchange="ageCount()" data-date="" data-date-format="DD MM YYYY">
                  <input type="number" class="form-control" id="txt_age"  placeholder="Age" value="{{ old('age') }}" readonly required  name="age">

                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dd_sex" class="col-lg-2 control-label">Sex :</label>
                <div class="col-lg-12">
                  <select class="form-select" aria-label="Default select example"  id="dd_sex" name='sex' required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="dd_withGovernID" class="col-lg-12 control-label">With Government ID:</label>
              <div class="col-lg-12">
                <select class="form-select" aria-label="Default select example" id="dd_withGovernID" name="hasValidID" @required(true)>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <label for="dd_governID" class="col-lg-12 control-label">Government ID:</label>
              <div class="col-lg-12">
                <select class="form-select" aria-label="Default select example" id="dd_governID" name="validID" @required(true)>
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
            <div class="col-md-3">
              <div class="form-group">
                <label for="txt_validIDNumber" class="col-lg-12 control-label">Valid ID Number:</label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" value="{{ old('validIDNumber') }}" id="txt_validIDNumber" placeholder=" Valid ID Number" name="validIDNumber" @required(true)>
                </div> 
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="file_id" class="col-lg-12 control-label">Government ID: </label>
                <div class="col-lg-12">
                <input type="file" class="form-control" id="file_id" accept="image/jpg, image/jpeg, image/png" name='validIDPhoto'>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                <div class="col-lg-12">
                  <input type="email" class="form-control" id="txt_email" value="{{ old('email') }}" placeholder="Email" name="email" required autocomplete="email">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="txt_pass" class="col-lg-6 control-label"> Password: </label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="txt_pass" value=""name="password" required autocomplete="new-password"> 
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="file_profile" class="col-lg-12 control-label">Profile Picture: </label>
                <div class="col-lg-12">
                <input type="file" class="form-control" id="file_profile" accept="image/jpg, image/jpeg, image/png"  name="photo">
              </div>
            </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="form-group">
                <button class="btn btn-sm btn-success" type="submit" style="width:100%">Register</button>
              </div>
            </div>
          </div>
      </div>
   </fieldset>
  </form>
  <script>
    var now = new Date(),
    // minimum date the user can choose, in this case now and in the future
    minDate = now.toISOString().substring(0,10);

$('#dt_birth').prop('min', minDate);

      //this following function is for calculating age based to their birthday and display it to input text age
      function ageCount() {
        var inputDate = document.getElementById("dt_birth").value;
    // Convert the input date to a Date object
    var date = new Date(inputDate);
    // Get the current date
    var today = new Date();
    // Calculate the difference in years, months and days
    var years = today.getFullYear() - date.getFullYear();
    var months = today.getMonth() - date.getMonth();
    var days = today.getDate() - date.getDate();
    // Adjust the values if needed
    if (months < 0 || (months == 0 && days < 0)) {
        years--;
        months += 12;
    }
    // Format the age as a string
    var age = years;
    // Display the age in the output input
    document.getElementById("txt_age").value = age;
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