<html>
  <head>
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
     <!-- Styles -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
     <!-- Bootstrap Icons CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
     <!-- custom CSS should come after Bootstrap CSS -->
     <link href="{{ asset('css/app.scss') }}" rel="stylesheet">
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