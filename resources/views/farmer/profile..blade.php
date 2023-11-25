@extends('layouts.master_farmer')
@section('title','Profile')
@section('content')
<div class='container-fluid' style="margin: auto">
    <form>
        <div class="row" style="background-color:#D0D0D0">
            <div class="col-md-4">
                <br/>
                <h5>Farmer's Basic Information</h5> 
                <div class="row g-2 d-flex justify-content-between">
                    <div class="col-auto">
                      <label for="farmID" class="col-form-label">Farmer's ID:</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="farmID" class="form-control" style="height:30px; border:1px solid #45822E; background-color:#F5F3F3">
                    </div>
                    <div class="col-auto">
                      <label for="farmFN" class="col-form-label">First Name:</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="farmFN" class="form-control" style="height:30px; border:1px solid #45822E; background-color:#F5F3F3">
                    </div>
                    <div class="col-auto">
                      <label for="farmMN" class="col-form-label">Middle Name:</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="farmMN" class="form-control" style="height:30px; border:1px solid #45822E; background-color:#F5F3F3">
                    </div>
                    <div class="col-auto">
                      <label for="farmLN" class="col-form-label">Last Name:</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="farmLN" class="form-control" style="height:30px; border:1px solid #45822E; background-color:#F5F3F3">
                    </div>
                    <div class="col-auto">
                      <label for="farmExtN" class="col-form-label">Extension Name:</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="farmExtN" class="form-control" style="height:30px; border:1px solid #45822E; background-color:#F5F3F3">
                    </div>
                    <div class="col-auto">
                      <label for="farmGender" class="col-form-label">Gender :</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select form-select-sm" aria-label="Default select example"style="height:30px; border:1px solid #45822E; background-color:#F5F3F3" >
                            <option selected>Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Others</option>
                          </select>
                    </div>  
                </div>                
            </div>
        </div>
    </form>
</div>
@endsection