<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <link rel = "icon" href = "{{ asset('/firmslogo.ico') }}"    type = "image/x-icon">
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
    <style>
       
    
    </style>

</head>
<body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0" style="background-color: #6CA26D">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                      <span class="fs-5 d-none d-sm-inline px-0 align-middle"> <h2><b> FIRMS </b></h2></span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li class="nav-item">
                          <a href="<?= url('firms/dashboard'); ?>" class="nav-link align-middle px-0 text-white ">
                              <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                          </a>
                      </li>
                      <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-file-earmark-text"></i> <span class="ms-1 d-none d-sm-inline">Insurance Report</span></a>
                        <ul class="collapse nav flex-column ms-1 text-white" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0 text-white"> <i class="fs-5"><x-phosphor-plant-bold style="width:25px; height:30px"/> </i><span class="ms-1 d-none d-sm-inline">Rice Crops</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white"> <i class="fs-5"><x-carbon-corn style="width:25px; height:30px"/></i><span class="ms-1 d-none d-sm-inline">Corn Crops</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 text-white"> <i class="fs-5"><x-carbon-fruit-bowl style="width:25px; height:30px"/></i><span class="ms-1 d-none d-sm-inline">High Value Crops</span></a>
                            </li>
                        </ul>
                    </li>
                      <li>
                          <a href="#" class="nav-link px-0 align-middle text-white">
                              <i class="fs-4 bi-file-earmark-arrow-up-fill"></i> <span class="ms-1 d-none d-sm-inline ">Notice of Loss</span></a>
                      </li>
                      <li>
                        <a href="#" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-file-earmark-check"></i> <span class="ms-1 d-none d-sm-inline ">Indemnity</span></a>
                    </li>
                      <li>
                          <a href="#" class="nav-link px-0 align-middle text-white">
                              <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Farm List</span> </a>
                      </li>
                  </ul>
                  <hr>
                  <div class="dropdown pb-4">
                      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                          <!--<img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"> -->
                          <span class="d-none d-sm-inline mx-1">User</span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-light text-small shadow">
                          <li><a class="dropdown-item" href="#">Settings</a></li>
                          <li><a class="dropdown-item" href="#">Profile</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="#">Sign out</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col py-2" style="background-color:#6CA26D; height:60px">
            <h2 class="px-0 pb-2">@yield('title')</h2>
            <br/>
            @yield('content')   
          </div>
      </div>
  </div>
</body>
</html>