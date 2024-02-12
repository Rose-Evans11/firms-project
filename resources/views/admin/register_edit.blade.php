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
  #txt_age{
    display: none;
  }
  </style>
<div class='container-fluid' style="margin: auto">
    <form class="form-horizontal" action="{{route('farmer.update', ['user'=>$user])}}" method="POST">
        @csrf
        @method('put')
        <fieldset>
        <div class="m-3">
        <div id="farmDeetInfo">
            <legend> <strong> Edit Farmer</strong> </legend>
            <br/>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="txt_RSBSA" class="col-lg-12 control-label">RSBSA Number: </label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_RSBSA" placeholder="RSBSA" name="rsbsa" @readonly(true) maxlength="19" minlength="19" value="{{$user->rsbsa}}">
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dd_active" class="col-lg-12 control-label">Status: </label>
                        <div class="col-lg-12">
                            <select class="form-select" aria-label="Default select example"  id="dd_active" name='isActive' required value>
                                <option selected>  {{$user->isActive}}</option>
                                <option value="Active">Active</option>
                                <option value="Not Active">Not Active</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="txt_fname" class="col-lg-6 control-label">First Name: </label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="txt_fname" value="{{$user->firstName}}" placeholder="First Name" name="firstName" required>
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                    <label for="txt_mname" class="col-lg-6 control-label">Middle Name: </label>
                    <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_mname" value="{{$user->middleName}}" placeholder="Middle Name" name="middleName">
                    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label for="txt_lname" class="col-lg-6 control-label">Last Name: </label>
                <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_lname" value="{{$user->lastName}}" placeholder="Last Name" name="lastName" required>
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                    <label for="txt_ext" class="col-lg-6 control-label">Extension Name: </label>
                    <div class="col-lg-12">
                    <input type="text" class="form-control" id="txt_ext" value="{{$user->extensionName}}" placeholder="Extension Name" name="extensionName">
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="dt_birth" class="col-lg-6 control-label">Birthdate: </label>
                    <div class="col-lg-12">
                    <input type="date"  max="9999-12-31" class="form-control" id="dt_birth" name="birthdate" required onchange="ageCount()" data-date="" data-date-format="DD MM YYYY" value="{{$user->birthdate}}">
                    <input type="number" class="form-control" id="txt_age"  placeholder="Age" readonly required  name="age" value="{{$user->age}}">

                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="dd_sex" class="col-lg-2 control-label">Sex :</label>
                    <div class="col-lg-12">
                    <select class="form-select" aria-label="Default select example"  id="dd_sex" name='sex' required value>
                        <option selected>  {{$user->sex}}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="txt_email" class="col-lg-6 control-label"> Email: </label>
                    <div class="col-lg-12">
                    <input type="email" class="form-control" id="txt_email" value="{{$user->email}}" placeholder="Email" name="email" required autocomplete="email">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label for="dd_barangay" class="col-lg-2 control-label">Barangay:</label>
                        <div class="col-lg-12">
                          <select class="form-select" aria-label="Default select example" required name="barangayAddress">
                            <option selected> {{$user->barangayAddress}} </option>
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
                <!--<div class="col-md-6">
                    <div class="form-group">
                        <label for="txt_pass" class="col-lg-6 control-label"> Password: </label>
                        <div class="col-lg-12">
                        <input type="password" class="form-control" id="txt_pass" value=""name="password" required autocomplete="new-password"> 
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="img_photo" class="col-lg-2 control-label">Farmer's Photo:</label>
                            <div class="col-lg-12">
                                <img src="{{('valid_id_image_location/' . $user->photo)}}" alt="Photo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="img_validID" class="col-lg-12 control-label">Farmer's Valid ID:</label>
                            <div class="col-lg-12">
                              <img src="{{('profile_image_location/' . $user->validIDPhoto)}}" alt="Valid ID">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" class="form-control" id="file_profile" accept="image/jpg, image/jpeg, image/png"  name="photo">
                    </div>
                    <div class="col-md-6">
                        <input type="file" class="form-control" id="file_id" accept="image/jpg, image/jpeg, image/png" name='validIDPhoto'>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                  <div class="col-lg-12 d-flex justify-content-end">
                    <div class="row">
                      <div class="col-md-6">
                        <a class="btn btn-sm btn-success m-2" href="<?= url('firms/farmer/register'); ?>" style="width:100%">Cancel</a>
                      </div>
                      <div class="col-md-6">
                        <button class="btn btn-sm btn-success m-2" type="submit" style="width:100%">Update</button>
                      </div>
                    </div>
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