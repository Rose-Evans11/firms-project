@extends('layouts.master_admin_landing')
@section('title','Forgot Password')
@section('content')

<div class="container-fluid" style="padding-top:50px; padding-left:50px; padding-right:50px">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
          <div class="card-header text-white bg-success"> <strong> Reset Password</strong></div>
            <div class="card-body">
              @if (Session::has('message'))
                   <div class="alert alert-success" role="alert">
                      {{ Session::get('message') }}
                  </div>
              @endif
              <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="email_address" class="col-md-4">Email Address:</label>
                        <div class="col-md-6">
                            <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <br/>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
          </div>
        </div>
    </div>
  </div>
</div>
<script>
  $(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
</script>
@endsection