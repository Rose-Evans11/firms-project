@extends('layouts.master_admin')
@section('title','Dashboard')
@section('content')
<div>
    <div class="row">
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"> <a href="{{route('admin.pending')}}" style="text-decoration: none; color:white"> Pending Report</a> </p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('status', 'Pending')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"><a href="{{route('admin.rejected')}}" style="text-decoration: none; color:white"> Rejected Report</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('status', 'Rejected')->orwhere('status', 'Partially Rejected')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                    <p class="card-title text-center fw-bolder"><a href="{{route('admin.approved')}}" style="text-decoration: none; color:white"> Approved Report</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('insurances')->where('status', 'Approved')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"><a href="{{route('admin.damage.index')}}" style="text-decoration: none; color:white"> Notice of Loss</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('damages')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
                <div class="card-body">
                  <p class="card-title text-center fw-bolder"><a href="{{route('admin.indemnity.index')}}" style="text-decoration: none; color:white"> Indemnity Claim</a></p>
                  <p class="card-text fs-1 text-center fw-bolder">{{DB::table('indemnities')->get()->count()}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
          <div class="card text-white mb-3" style="background-color:#6CA26D; max-height: 125px">
              <div class="card-body">
                <p class="card-title text-center fw-bolder"><a href="<?= url('firms/farmer/register'); ?>" style="text-decoration: none; color:white"> Farmer</a></p>
                <p class="card-text fs-1 text-center fw-bolder">{{DB::table('users')->get()->count()}}</p>
              </div>
          </div>
      </div>
    </div>
    <br/>
    <form action="{{ route('admin.insurance.find') }}" method="GET"> 
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <div class="col-lg-2">
                  <label for="txt_RSBSA" class="control-label"> <h4> Search: </h4> </label>
                </div>
                <div class="col-lg-2">
                  <input type="text" class="form-control" placeholder="Search here....." name="query" value="{{ request()->input('query') }}" minlength="2" style="width:100%">
                  <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success" style="width:100%">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-lg-2">
              <div class="form-group">
                <button type="submit" class="btn btn-success" style="width:100%">Excel</button>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <button type="submit" class="btn btn-success" style="width:100%">CSV</button>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <button type="submit" class="btn btn-success" style="width:100%">PDF</button>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <button type="submit" class="btn btn-success" style="width:100%">Print</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <div class="row">
      <h6> Insurance Report </h6>
        <div class="col-md-12">
            <div class="table-wrapper" style=" width:100%; overflow-x:scroll">
             @if(isset($insurances))
              <table class="table table-bordered table-striped">
                <thead>
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
                    <th>@sortablelink('statusNote',"Status Note")</th>
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
                     <td>{{$insurance->statusNote}}</td>
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
</div>
@endsection