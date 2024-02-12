@extends('layouts.master_farmer')
@section('title','Notice of Loss')
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
    display: none;
    margin: auto;
  }
  </style>
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
<div class='container-fluid' style="margin: auto">
  <div class="row">
    <div class="col-md-2 m-3">
      <div class="col-lg-12">
        <a href="{{route('insurance.approved')}}" style="text-decoration: none; color:white" class="btn btn-success">Add Notice of Loss</a>
      </div>
    </div>
  </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="table-wrapper" style=" width:100%; overflow-x:scroll">  
            <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>Notice of Loss ID</th>
                    <th>Crops</th>
                    <th>Crop Insurance ID</th>
                    <th>Damage Cause</th>
                    <th>Date of Loss</th>
                    <th>Expected Harvest Date</th>
                    <th>Farm Location</th>
                    <th>Crop Before</th>
                    <th>Crop After</th>
                    <th>Date Submitted</th>
                    <th>Edit</th>
                    <th>File Indemnity</th>
                      
                  </tr>
              </thead>
              <tbody>
                @if(count($damages) > 0)
                @foreach ($damages as $damage)
                <tr>
                 <td>{{$damage->id}} </td>
                 <td>{{$damage->cropName}}</td>
                 <td>{{$damage->cropInsuranceID}} </td>
                 <td>{{$damage->damageCause}} </td>
                 <td>{{$damage->dateLoss}}</td>
                 <td>{{$damage->dateHarvest}}</td>
                 <td>{{$damage->barangayFarm}}</td>
                 <td>
                  <img src="{{('crop_before_location/' . $damage->crop_before)}}" alt="Crop before damage" style="width:150px; height:auto">
                 </td>
                 <td>
                  <img src="{{('crop_after_location/' . $damage->crop_after)}}" alt="Crop after damage" style="width:150px; height:auto">
                 </td>
                 <td>{{$damage->dateSubmitted}}</td>
                 <td><a href="{{route('damage.edit', ['damage'=>$damage->id])}}" style="width:100%; text-decoration:none"> Edit</a></td>
                 <td><a href="{{route('damage.view', ['damage'=>$damage->id])}}" style="width:100%; text-decoration:none"> View</a></td>
                 <td><a href="{{route('indemnity.add', ['damage'=>$damage->id])}}" style="width:100%; text-decoration:none"> File Indemnity</a></td>
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