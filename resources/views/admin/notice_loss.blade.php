@extends('layouts.master_admin')
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
    <div class="col-lg-2">
      <div class="col-lg-12">
        <a href="{{route('admin.approved')}}" style="text-decoration: none; color:white;margin-top:5px" class="btn btn-success">Add Notice of Loss</a>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/notice-of-loss/excel/') }}">Excel</a>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/notice-of-loss/csv/') }}">CSV</a>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <a type="submit" class="btn btn-success" style="width:100%; margin-top:5px" href="{{ URL::to('/notice-of-loss/pdf/') }}">PDF</a>
      </div>
    </div>
  </div>
<br/>
    <div class="row">
        <div class="col-lg-12">
          <div class="table-wrapper" style=" width:100%; overflow-x:scroll">  
            @if(isset($damages))
            <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>Notice of Loss ID</th>
                    <th>@sortablelink('farmersID',"Farmer's ID")</th>
                    <th>@sortablelink('rsbsa','RSBSA')</th>
                    <th>@sortablelink('firstName','First Name')</th>
                    <th>@sortablelink('lastName','Last Name')</th>
                    <th>@sortablelink('barangayAddress','Barangay')</th>
                    <th>@sortablelink('cropInsuranceID','Crop Insurance ID')</th>
                    <th>@sortablelink('cropName','Crops')</th>
                    <th>@sortablelink('insuranceType','Insurance Type')</th>
                    <th>@sortablelink('areaInsured','Area Insured')</th>
                    <th>@sortablelink('cicNumber','CIC Number')</th>
                    <th>@sortablelink('damageCause','Damage Cause')</th>
                    <th>@sortablelink('extentDamage','Extent of Damage')</th>
                    <th>@sortablelink('dateLoss','Date of Loss')</th>
                    <th>@sortablelink('growthStage','Growth Stage')</th>
                    <th>@sortablelink('AreaDamage','Area Damage')</th>
                    <th>@sortablelink('expectedHarvest','Expected Harvest Date')</th>
                    <th>@sortablelink('barangayFarm','Farm Location')</th>
                    <th>@sortablelink('crop_before','Crop Before')</th>       
                    <th>@sortablelink('crop_after','Crop After')</th>
                    <th>@sortablelink('dateSubmitted','Date Submitted')</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>File Indemnity</th>
                      
                  </tr>
              </thead>
              <tbody>
                @if(count($damages) > 0)
                @foreach ($damages as $damage)
                <tr>
                 <td>{{$damage->id}} </td>
                 <td>{{$damage->farmersID}} </td>
                 <td>{{$damage->rsbsa}} </td>
                 <td>{{$damage->firstName}} </td>
                 <td>{{$damage->LastName}} </td>
                 <td>{{$damage->barangayAddress}} </td>
                 <td>{{$damage->cropInsuranceID}} </td>
                 <td>{{$damage->cropName}}</td>
                 <td>{{$damage->insuranceType}}</td>
                 <td>{{$damage->areaInsured}}</td>
                 <td>{{$damage->cicNumber}}</td>
                 <td>{{$damage->damageCause}} </td>
                 <td>{{$damage->extentDamage}} </td>
                 <td>{{$damage->dateLoss}}</td>
                 <td>{{$damage->growthStage}}</td>
                 <td>{{$damage->areaDamage}}</td>
                 <td>{{$damage->dateHarvest}}</td>
                 <td>{{$damage->barangayFarm}}</td>
                 <td>
                  <img src="{{('crop_before_location/' . $damage->crop_before)}}" alt="Crop before damage" style="width:150px; height:auto">
                 </td>
                 <td>
                  <img src="{{('crop_after_location/' . $damage->crop_after)}}" alt="Crop after damage" style="width:150px; height:auto">
                 </td>
                 <td>{{$damage->dateSubmitted}}</td>
                 <td><a href="{{route('admin.damage.edit', ['damage'=>$damage->id])}}" style="width:100%; text-decoration:none"> Edit</a></td>
                 <td><a href="{{route('admin.damage.view', ['damage'=>$damage->id])}}" style="width:100%; text-decoration:none"> View</a></td>
                 <td><a href="{{route('admin.indemnity.add', ['damage'=>$damage->id])}}" style="width:100%; text-decoration:none"> File Indemnity</a></td>
                </tr>
                @endforeach
                @else
                 <tr><td>No result found!</td></tr>
                @endif
              </tbody>
            </table>
            <div class="pagination-block">
              <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
              {{  $damages->appends(request()->input())->links('layouts.paginationlinks') }}
            </div>
           @endif
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