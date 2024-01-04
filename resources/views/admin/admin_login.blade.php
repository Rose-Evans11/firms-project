@extends('layouts.master_admin_landing')
@section('title','FIRMS')
@section('content')
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
              {{Session::get('errmessage')}}
              <form method="POST" action="/login">
                @csrf
                <div class="form-group">
                  <label for="txt_email" class="col-lg-12 control-label">Email: </label>
                  <div class="col-lg-12">
                    <input type="email" class="form-control" id="txt_email" placeholder="Email" aria-describedby="inputGroup-sizing-default"  name=loginEmail>
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
    </div>
  </div>
</div>
    
@endsection 