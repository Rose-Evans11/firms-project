@extends('layouts.master_farmer')
@section('title','Pending')
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
  <form action="{{ route('web.find') }}" method="GET"> 
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
    </div>
  </form>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Insurance ID</th>
                <th>Crops</th>
                <th>@sortablelink('insuranceType','Insurance Type')</th>
                <th>@sortablelink('created_at', 'Date Created')</th>
                <th>Expected Harvest Date</th>
                <th>Farm Location</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Edit</th>
                
            </tr>
        </thead>
        <tbody>
            @if(count($insurances) > 0)
            @foreach ($insurances as $insurance)
            <tr>
             <td>{{$insurance->id}} </td>
             <td>{{$insurance->cropName}}</td>
             <td>{{$insurance->insuranceType}}</td>
             <td>{{$insurance->created_at}}</td>
             <td>{{$insurance->dateHarvest}}</td>
             <td>{{$insurance->barangayFarm}}</td>
             <td>{{$insurance->status}}</td>
             <td>{{$insurance->statusNote}}</td>
             <td><a href="{{route('insurance.edit', ['insurance'=>$insurance->id])}}"> Edit</a></td>
            </tr>
            @endforeach
            @else
             <tr><td>No result found!</td></tr>
            @endif
        </tbody>
    </table>
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