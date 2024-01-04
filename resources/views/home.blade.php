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
   
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success px-5">
        <div class="container-fluid">
          <a class="navbar-brand navbar-light" href="#"><img src="{{ asset('images/firms.png') }}" class="img-fluid" style="width:100px" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
      <div class="contain-fluid ">
        <div  class='container-fluid' style="margin: auto">
            <div class="row" style="padding: 80px">
                <div class="col-md-6" style=" padding-left:50px; padding-right:50px">
                  <img src="{{ asset('images/img_home.png') }}" class="img-fluid" alt="" />
                  <br />
                  <br />
                  <p class="lead text-center">
                    <h5>
                      <b>With FIRMS, we protect your crops as we protect your future.</b>
                    </h5>
                  </p>
                </div>
                <div class="col-md-6" style="padding-top: 50px;padding-left: 90px">
                  <h4><b>Login to your Account</b> </h4>
                    <a class="btn btn-sm mt-4 btn-success" type="submit" style="width: 60%" href="<?= url('firms/admin/login'); ?>"> Admin</a>
                    <a class="btn btn-sm mt-4 btn-success" type="submit" style="width: 60%" href="<?= url('firms/farmer/login'); ?>"> Farmer</a>
                  </form>
                </div>
              </div>
        </div>
      </div>
</body>
</html>