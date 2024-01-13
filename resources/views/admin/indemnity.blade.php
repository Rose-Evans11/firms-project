@extends('layouts.master_farmer')
@section('title','Indemnity')
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
        <a href="{{route('admin.damage.index')}}" style="text-decoration: none; color:white" class="btn btn-success">Add Indemnity</a>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-wrapper" style=" width:100%; overflow-x:scroll">  
          
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Indemnity ID</th>
                    <th>Crop Insurance ID</th>
                    <th>Crops</th>
                    <th>Notice of Loss ID</th>
                    <th>Damage Cause</th>
                    <th>Date of Loss</th>
                    <th>Expected Harvest Date</th>
                    <th>Date Submitted</th>
                    <th>Edit</th>
                    <th>View</th>
                    
                </tr>
            </thead>
            <tbody>
              @if(count($indemnities) > 0)
              @foreach ($indemnities as $indemnity)
              <tr>
               <td>{{$indemnity->id}} </td>
               <td>{{$indemnity->cropInsuranceID}} </td>
               <td>{{$indemnity->cropName}}</td>
               <td>{{$indemnity->damageID}} </td>
               <td>{{$indemnity->damageCause}} </td>
               <td>{{$indemnity->dateLoss}}</td>
               <td>{{$indemnity->dateHarvest}}</td>
               <td>{{$indemnity->dateSubmitted}}</td>
               <td><a href="{{route('admin.indemnity.edit', ['indemnity'=>$indemnity->id])}}" style="width:100%; text-decoration:none"> Edit</a></td>
               <td><a href="{{route('admin.indemnity.view', ['indemnity'=>$indemnity->id])}}" style="width:100%; text-decoration:none"> View</a></td>
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
</div>
@endsection