@extends('layouts.master_farmer')
<head>
  <title> FIRMS</title>
</head>
@section('content')
<div class="container-fluid d-flex justify-content-center"">
  <div class="row" style="padding: 80px">
    <div class="col-md-6" style="padding-left: 90px">
      <img src="{{ asset('Images/img_home.png') }}" class="img-fluid" alt="" />
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
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    {{Session::get('success')}}
      <br />
      <form method="POST" action="/login">
        @csrf
        <div class="form-floating">
          <input type="email" class="form-control-sm" id="floatingInput" placeholder="Email" aria-describedby="inputGroup-sizing-default" style="width: 60%" name=loginEmail>
        </div>
        <br />
        <div class="form-floating">
          <input type="password" class="form-control-sm" id="floatingPassword" placeholder="Password" style="width: 60%" name="loginPass">
        </div>
       <!-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="btn btn-sm mt-4 btn-success" type="submit" style="width: 60%">Log in</button>
      </form>
    </div>
  </div>
</div>

    
@endsection