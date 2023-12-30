<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <link rel = "icon" href = "{{ asset('/firms_green.ico') }}"    type = "image/x-icon">
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
    <!-- <script>
      function initializeMap() {
      const map = L.map('destination-map').setView([13.9416, 121.1182], 12);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
      }).addTo(map);

      map.on('click', function (e) {
      const lat = e.latlng.lat;
      const lng = e.latlng.lng;
      document.getElementById('destination-lat').value = lat;
      document.getElementById('destination-lng').value = lng;

      // Reverse geocoding using OpenStreetMap Nominatim API
      const geocodingUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;

      fetch(geocodingUrl)
        .then(response => response.json())
        .then(data => {
          const address = data.display_name;
          document.getElementById('destination').value = address;
        })
        .catch(error => {
          console.log('Error getting address:', error);
        });
      });
      }
    </script>  this will remove only if needed for google map-->
    <!-- this following line of code is for  google map -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" /> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success px-5">
        <div class="container-fluid">
          <a class="navbar-brand navbar-light" href="#"><img src="{{ asset('Images/firms.png') }}" class="img-fluid" style="width:100px" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              @guest
             <li class="nav-item"><a class="nav-link" href="<?= url('firms/'); ?>">Home</a></li>
             <li class="nav-item"><a class="nav-link" href="<?= url('firms/about'); ?>">About</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= url('firms/insurance-program'); ?>">Insurance Program</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?= url('firms/contact'); ?>">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= url('firms/help'); ?>">Help</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= url('/firms/farmer/login'); ?>">Login</a></li>
              @endguest
              @auth
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= url('firms/dashboard'); ?>"> Dashboard</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Insurance Report
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="<?= url('firms/rice-insurance'); ?>">Rice Insurance</a></li>
                  <li><a class="dropdown-item" href="<?= url('firms/corn-insurance'); ?>">Corn Insurance</a></li>
                  <li><a class="dropdown-item" href="<?= url('firms/hvc-insurance'); ?>">High Value Crops</a></li>
                </ul>
              </li>
              <li class="nav-item"> <a class="nav-link" aria-current="page" href="<?= url('firms/farmer/notice-loss'); ?>"> Notice of Loss</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= url('firms/farmer/indemnity'); ?>"> Indemnity</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="<?= url('firms/farmer/farm-list'); ?>"> Farm List</a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                <ul class="dropdown-menu" ari`a-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="<?= url('firms/farmer/change-password'); ?>">Change Password</a></li>
                  <li><a class="dropdown-item" href="<?= url('firms/farmer/profile'); ?>"> {{Auth::User()->firstName}} </a></li>
                </ul>
              </li>
              <li class="nav-item">
                <form id="logout-form" action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success text-white"> Logout</button>
              </form>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
      <div class="contain-fluid p-5 ">
        <div>
           <h3> @yield('title')</h3>
        </div>
        <div  class='container-fluid' style="margin: auto">
        @yield('content')
        </div>
      </div>
</body>
</html>