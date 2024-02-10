<html>
  <head>
  </head>
  <body>
      <div class="row d-flex justify-content-center">
        <table style="width:100%">
        <tr padding="0px">
          <td style="width:5%"></td>
          <td> <img src="{{ asset('images/img_tanauan.png') }}" style=" width:180px; height:auto;" /> </td>
          <td>
            <p style="text-center">
            City of Agriculturist<br />
            New City Hall Building, Laurel Hill, Natatas,<br />
            Tanauan City, Batangas<br />
            Region IV- A (CALABARZON)
           </p>
          </td>
          <td style="width:5%"></td>
          <td><img src="{{ asset('images/firms.png') }}" style="width:180px; height:auto;"/></td>
        </tr>                  
        </table>
      </div>
      <div class="row">
        <h4> Tanauan City Farmer List </h4>
        <div class="col-md-12">
          <div class="table-wrapper" style=" width:100%;">
            <table class="table table-bordered table-striped mb-5">
              <thead>
                <th>Farmer's ID</th>
                <th>RSBSA</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Extension Name</th>
                <th>isActive</th>
                <th>Barangay Address</th>
                <th>Contact Number</th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{$user->id}} </td>
                  <td>{{$user->rsbsa}}</td>
                  <td>{{$user->firstName}}</td>
                  <td>{{$user->middleName}}</td>
                  <td>{{$user->lastName}}</td>
                  <td>{{$user->extensionName}}</td>
                  <td>{{$user->isActive}}</td>
                  <td>{{$user->barangayAddress}}</td>
                  <td>{{$user->contactNumber}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        </div>
      </div>
  </body>
</html>