@extends('layouts.master_admin_landing')
@section('title','FIRMS')
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
      <h4><b>Login as Admin</b> </h4>
      <br />
      <form method="">
        <div class="form-floating">
          <input type="email" class="form-control-sm" id="floatingInput" placeholder="Email" aria-describedby="inputGroup-sizing-default" style="width: 60%">
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
          <div class="card-header text-white bg-success"> <strong>Login to your Account</strong></div>
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
              @endif
              <strong class="text-danger">
              {{Session::get('errmessage')}}
              </strong>
              <form method="POST" action="{{route('admin.login')}}">
                @csrf
                <div class="form-group">
                  <label for="txt_email" class="col-lg-12 control-label">Email: </label>
                  <div class="col-lg-12">
                    <input type="email" class="form-control" id="txt_email" placeholder="Email" aria-describedby="inputGroup-sizing-default"  name=loginEmail autocomplete="email">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label for="txt_password" class="col-lg-12 control-label">Password: </label>
                  <div class="col-lg-12">
                    <input type="password" class="form-control" id="txt_password" placeholder="Password" name="loginPass">
                  </div>
                </div>
                <div class="form-group row mt-3">
                  <div class="col-md-12">
                      <div class="checkbox">
                          <label>
                            <a href="{{ route('admin.forget.password.get') }}" class="">Forgot password?</a>
                          </label>
                      </div>
                  </div>
                </div>
               <!--<div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div> -->
                <div class="col-md-12">
                  <button class="btn btn-sm mt-3 btn-success" style="width:100%" type="submit">Log in</button>
                </div>
              </form>
            </div>
        </div>
        <br />
        <div class="form-floating">
          <input type="password" class="form-control-sm" id="floatingPassword" placeholder="Password" style="width: 60%">
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-sm mt-1 btn-success" type="submit" style="width: 60%">Log in</button>
      </form>
    </div>
  </div>
</div>

    
@endsection 