@extends('layouts.master_farmer')
@section('title','Dashboard')
@section('content')
<div>
    <div class="row">
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder">Pending Report</p>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder">Rejected Report</p>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                    <p class="card-title text-center fw-bolder">Approved Report</p>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
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
                        <th>Filed Date</th>
                        <th>Expected Harvest Date</th>
                        <th>Farm Location</th>
                        <th>Status</th>
                        <th>Notes</th>
                        
                    </tr>
                </thead>
                <tbody>
               <!-- add here the data -->
                </tbody>
            </table>
        </div>
    </div>
@endsection