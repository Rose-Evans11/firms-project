<html>
    <head></head>
    <body>
      <div class="row d-flex justify-content-center">
      <table style="width:100%">
        <tr padding="0px">
          <td style="width:10%"></td>
          <td> <img src="{{ asset('images/img_tanauan.png') }}" style=" width:180px; height:auto;" /> </td>
          <td>
            <p>
            City of Agriculturist<br />
            New City Hall Building, Laurel Hill, Natatas,<br />
            Tanauan City, Batangas<br />
            Region IV- A (CALABARZON)
           </p>
          </td>
          <td style="width:10%"></td>
          <td><img src="{{ asset('images/firms.png') }}" style="width:180px; height:auto;"/></td>
        </tr>                  
      </table>
      </div>
        <div class="row">
            <h4> Insurance Report </h4>
              <div class="col-md-12">
                  <div class="table-wrapper" style=" width:100%;">
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
                      </tbody>
                    </table>
                </div>
              </div>
          </div>
    </body>
</html>