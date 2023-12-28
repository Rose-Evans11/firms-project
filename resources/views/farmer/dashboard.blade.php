@extends('layouts.master_farmer')
@section('title','Dashboard')
@section('content')
<div>
    <div class="row">
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder">Pending Report</p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('farmersID', auth()->id())->where('status', 'Pending')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder">Rejected Report</p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('farmersID', auth()->id())->where('status', 'Reject')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                    <p class="card-title text-center fw-bolder">Approved Report</p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('farmersID', auth()->id())->where('status', 'Approved')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder">Notice of Loss</p>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder">Farm List</p>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder">Indemnity Report</p>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Insurance ID</th>
                        <th>Crops</th>
                        <th>Insurance Type</th>
                        <th>Date Planted Type</th>
                        <th>Expected Harvest Date</th>
                        <th>Farm Location</th>
                        <th>Status</th>
                        <th>Notes</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if(count($insurances) > 0)
                    @foreach ($insurances as $insurance)
                    <tr>
                     <td>{{$insurance->id}} </td>
                     <td>{{$insurance->cropName}}</td>
                     <td>{{$insurance->insuranceType}}</td>
                     <td>{{$insurance->datePlanted}}</td>
                     <td>{{$insurance->dateHarvest}}</td>
                     <td>{{$insurance->barangayFarm}}</td>
                     <td>{{$insurance->status}}</td>
                     <td>{{$insurance->statusNotes}}</td>
                    </tr>
                    @endforeach
                    @else
                     <tr><td>No result found!</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection