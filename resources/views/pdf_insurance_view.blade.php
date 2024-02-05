<html>
    <head></head>
    <body>
        <div class="row">
            <h4> Insurance Report </h4>
              <div class="col-md-12">
                  <div class="table-wrapper" style=" width:100%; overflow-x:scroll">
                    <table class="table table-bordered table-striped">
                      <thead>
                          <th>Insurance ID</th>
                          <th>Crops</th>
                          <th>Insurance Type</th>
                          <th>Farmer's ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Barangay</th>
                          <th>City</th>
                          <th>Date of Harvest</th>
                          <th>Farm Location</th>
                          <th>Date Created</th>
                          <th>Status</th>
                          <th>Status Note</th>
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
    </body>
</html>