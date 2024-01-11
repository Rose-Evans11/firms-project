@extends('layouts.master_admin')
@section('title','Pending Insurance')
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
  <form action="{{ route('admin.insurance.pending.find') }}" method="GET"> 
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <div class="row">
            <div class="col-lg-2">
              <label for="txt_RSBSA" class="control-label"> <h4> Search: </h4> </label>
            </div>
            <div class="col-lg-5">
              <input type="text" class="form-control" placeholder="Search here....." name="query" value="{{ request()->input('query') }}" minlength="2" style="width:100%">
              <span class="text-danger">@error('query'){{ $message }} @enderror</span>
            </div>
            <div class="col-lg-5">
              <div class="form-group">
                <button type="submit" class="btn btn-success" style="width:100%">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-lg-5">
          <div class="form-group">
            <a href="{{ URL::previous() }}" style="width:100%; text-decoration:none">View All</a>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-wrapper" style=" width:100%; overflow-x:scroll">
        @if(isset($insurances))
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
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
               <td><a href="{{route('admin.insurance.edit', ['insurance'=>$insurance->id])}}" style="width:100%; text-decoration:none;white-space: nowrap; "> Edit</a></td>
               <td><a href="{{route('admin.insurance.view', ['insurance'=>$insurance->id])}}" style="width:100%; text-decoration:none;white-space: nowrap; "> View</a></td>
              </tr>
              @endforeach
              @else
               <tr><td>No result found!</td></tr>
              @endif
          </tbody>
        </table>
        <div class="pagination-block">
          <?php //{{ $countries->links('layouts.paginationlinks') }} ?>
          {{  $insurances->appends(request()->input())->links('layouts.paginationlinks') }}
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