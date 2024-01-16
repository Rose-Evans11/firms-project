@extends('layouts.master_farmer')
@section('title','Dashboard')
@section('content')
<div>
    <div class="row">
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"> <a href="{{route('insurance.pending')}}" style="text-decoration: none; color:white"> Pending Report</a> </p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('farmersID', Auth::guard('web')->user()->id)->where('status', 'Pending')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"><a href="{{route('insurance.rejected')}}" style="text-decoration: none; color:white"> Rejected Report</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{ DB::table('insurances')->where('farmersID', Auth::guard('web')->user()->id)->whereIn('status', ['Rejected', 'Partially Rejected'])->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                    <p class="card-title text-center fw-bolder"><a href="{{route('insurance.approved')}}" style="text-decoration: none; color:white"> Approved Report</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('farmersID', Auth::guard('web')->user()->id)->where('status', 'Approved')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"><a href="{{route('damage.index')}}" style="text-decoration: none; color:white"> Notice of Loss</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('damages')->where('farmersID', auth()->id())->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"><a href="{{route('farm.index')}}" style="text-decoration: none; color:white"> Farm List</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('farms')->where('farmersID', Auth::guard('web')->user()->id)->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"><a href="{{route('indemnity.index')}}" style="text-decoration: none; color:white"> Indemnity Claim</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('indemnities')->where('farmersID', Auth::guard('web')->user()->id)->get()->count()}}</p>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <form action="{{ route('insurance.find') }}" method="GET"> 
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
        <div class="col-md-12">
          <div class="table-wrapper" style=" width:100%; overflow-x:scroll">
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
                     <td>{{$insurance->created_at}}</td>
                     <td>{{$insurance->dateHarvest}}</td>
                     <td>{{$insurance->barangayFarm}}</td>
                     <td>{{$insurance->status}}</td>
                     <td>{{$insurance->statusNote}}</td>
                     <td><a href="{{route('insurance.view', ['insurance'=>$insurance->id])}}" style="width:100%; text-decoration:none"> View</a></td>
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
@endsection