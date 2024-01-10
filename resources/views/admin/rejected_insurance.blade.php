@extends('layouts.master_admin')
@section('title','Rejected Insurance')
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
  @if (session()->has('success'))
    <div class="alert alert-success">
     {{Session::get('success')}}
    </div> 
  @endif
  <div class="row">
    <div class="col-lg-12">
      <div class="table-wrapper" style=" width:100%; overflow-x:scroll">
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Insurance ID</th>
                  <th>Insurance ID</th>
                  <th>@sortablelink('cropName','Crops')</th>
                  <th>@sortablelink('insuranceType','Insurance Type')</th>
                  <th>@sortablelink('farmersID',"Farmer's ID")</th>
                  <th>@sortablelink('firstName',"First Name")</th>
                  <th>@sortablelink('lastName',"Last Name")</th>
                  <th>@sortablelink('barangayAddress',"Barangay")</th>
                  <th>@sortablelink('cityAddress',"City")</th>
                  <th>@sortablelink('dateHarvest',"Date of Harvest")</th>
                  <th>@sortablelink('barangayFarm',"Farm Location")</th>
                  <th>@sortablelink('created_at', 'Date Created')</th>
                  <th>@sortablelink('status',"Status")</th>
                  <th>@sortablelink('statusNote',"Status Note")</th>
                  <th>Edit</th>
                  <th>View</th>
              </tr>
          </thead>
          <tbody>
              @if(count($insurances) > 0)
              @foreach ($insurances as $insurance)
              <tr>
               <td>{{$insurance->id}} </td>
               <td>{{$insurance->cropName}}</td>
               <td>{{$insurance->insuranceType}}</td>
               <td>{{$insurance->farmersID}}</td>
               <td>{{$insurance->firstName}}</td>
               <td>{{$insurance->lastName}}</td>
               <td>{{$insurance->barangayAddress}}</td>
               <td>{{$insurance->cityAddress}}</td>
               <td>{{$insurance->dateHarvest}}</td>
               <td>{{$insurance->barangayFarm}}</td>
               <td>{{$insurance->created_at}}</td>
               <td>{{$insurance->status}}</td>
               <td>{{$insurance->statusNote}}</td>
               <td><a href="{{route('admin.insurance.edit', ['insurance'=>$insurance->id])}}" style="width:100%; text-decoration:none;white-space: nowrap; "> Edit</a></td>
               <td><a href="{{route('admin.insurance.view', ['insurance'=>$insurance->id])}}" style="width:100%; text-decoration:none;white-space: nowrap; "> View</a></td>
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