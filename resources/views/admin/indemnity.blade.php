@extends('layouts.master_admin')
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
    <div class="col-md-2">
      <div class="col-lg-12">
        <a href="{{route('admin.damage.index')}}" style="text-decoration: none; color:white;margin-top:5px" class="btn btn-success">Add Indemnity</a>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/indemnity/excel/') }}">Excel</a>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/indemnity/csv/') }}">CSV</a>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/indemnity/pdf/') }}">PDF</a>
      </div>
    </div>
  </div>
  <br/>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-wrapper" style=" width:100%; overflow-x:scroll">  
          @if(isset($indemnities))
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Indemnity ID</th>
                  <th>@sortablelink('farmersID',"Farmer's ID")</th>
                  <th>@sortablelink('firstName','First Name')</th>
                  <th>@sortablelink('lastName','Last Name')</th>
                  <th>@sortablelink('contactNumber','contactNumber')</th>
                  <th>@sortablelink('barangayAddress','Barangay')</th>
                  <th>@sortablelink('cropInsuranceID','Crop Insurance ID')</th>
                  <th>@sortablelink('cropName','Crops')</th>
                  <th>@sortablelink('insuranceType','Insurance Type')</th>
                  <th>@sortablelink('areaInsured','Area Insured')</th>
                  <th>@sortablelink('cicNumber','CIC Number')</th>
                  <th>@sortablelink('damageID','Notice of Loss ID')</th>
                  <th>@sortablelink('damageCause','Damage Cause')</th>
                  <th>@sortablelink('extentDamage','Extent of Damage')</th>
                  <th>@sortablelink('dateLoss','Date of Loss')</th>
                  <th>@sortablelink('growthStage','Growth Stage')</th>
                  <th>@sortablelink('AreaDamage','Area Damage')</th>
                  <th>@sortablelink('expectedHarvest','Expected Harvest Date')</th>
                  <th>@sortablelink('barangayFarm','Farm Location')</th>
                  <th>@sortablelink('dateSubmitted','Date Submitted')</th>
                  <th>@sortablelink('dateClaiming','Date to Claim')</th>
                  <th>@sortablelink('amountToClaim','Amount to Claim')</th>
                  <th>@sortablelink('receivedBy','Received By')</th>
                  <th>@sortablelink('dateReceivedBy','Date Received By')</th>
                  <th>@sortablelink('statusClaim','Status')</th>
                  <th>Edit</th>
                  <th>View</th>
                    
                </tr>
            </thead>
            <tbody>
              @if(count($indemnities) > 0)
              @foreach ($indemnities as $indemnity)
              <tr>
               <td>{{$indemnity->id}} </td>
               <td>{{$indemnity->farmersID}} </td>
               <td>{{$indemnity->firstName}} </td>
               <td>{{$indemnity->lastName}} </td>
               <td>{{$indemnity->contactNumber}} </td>
               <td>{{$indemnity->barangayAddress}} </td>
               <td>{{$indemnity->cropInsuranceID}} </td>
               <td>{{$indemnity->cropName}}</td>
               <td>{{$indemnity->insuranceType}}</td>
               <td>{{$indemnity->areaInsured}}</td>
               <td>{{$indemnity->cicNumber}}</td>
               <td>{{$indemnity->damageID}} </td>
               <td>{{$indemnity->damageCause}} </td>
               <td>{{$indemnity->extentDamage}} </td>
               <td>{{$indemnity->dateLoss}}</td>
               <td>{{$indemnity->growthStage}}</td>
               <td>{{$indemnity->areaDamage}}</td>
               <td>{{$indemnity->dateHarvest}}</td>
               <td>{{$indemnity->barangayFarm}}</td>
               <td>{{$indemnity->dateSubmitted}}</td>
               <td>{{$indemnity->dateClaiming}}</td>
               <td>{{$indemnity->amountToClaim}}</td>
               <td>{{$indemnity->receivedBy}}</td>
               <td>{{$indemnity->dateReceivedBy}}</td>
               <td>{{$indemnity->statusClaim}}</td>
               <td><a href="{{route('admin.indemnity.edit', ['indemnity'=>$indemnity->id])}}" style="width:100%; text-decoration:none"> Edit</a></td>
               <td><a href="{{route('admin.indemnity.view', ['indemnity'=>$indemnity->id])}}" style="width:100%; text-decoration:none"> View</a></td>
              </tr>
              @endforeach
              @else
               <tr><td>No result found!</td></tr>
              @endif
            </tbody>
          </table>
          <div class="pagination-block">
            <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
            {{  $indemnities->appends(request()->input())->links('layouts.paginationlinks') }}
          </div>
         @endif
        </div>
        </div>
      </div>
    </div>
</div>
@endsection