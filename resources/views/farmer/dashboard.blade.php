@extends('layouts.master_farmer')
@section('title','Dashboard')
@section('content')
<div class='container-fluid' style="margin: auto">
    <div class="row">
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <h5 class="card-title text-center">Pending</h5>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <h5 class="card-title text-center">Initial Rejects</h5>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <h5 class="card-title text-center">Fully Rejected</h5>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <h5 class="card-title text-center">Approved</h5>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <h5 class="card-title text-center">Farm List</h5>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <h5 class="card-title text-center">Indemnity</h5>
                  <p class="card-text fs-1 text-center fw-bolder">0</p>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-10">
           table
        </div>
    </div>
@endsection