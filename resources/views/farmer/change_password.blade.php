@extends('layouts.master_farmer')
@section('title','Change Password')
@section('content')

<div class='container-fluid' style="margin: auto">
    <div class="row d-flex justify-content-center">
      @if($errors->any())
      {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
      @endif
      @if(Session::get('error') && Session::get('error') != null)
      <div style="color:red">{{ Session::get('error') }}</div>
      @php
      Session::put('error', null)
      @endphp
      @endif
      @if(Session::get('success') && Session::get('success') != null)
      <div style="color:green">{{ Session::get('success') }}</div>
      @php
      Session::put('success', null)
      @endphp
      @endif
           <form method="POST" action="{{ route('farmer.updatePassword'), Auth::user()->id }}">
            @csrf
            <div class="col-md-12">
                <label for="current_password" class="col-lg-12 control-label">Old Password:</label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
              </div>
            <div class="col-md-12">
                <label for="new_password" class="col-lg-12 control-label">New Password:</label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
            </div>
            <div class="col-md-12">
                <label for="new_password_confirmation" class="col-lg-12 control-label">Confirm Password:</label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button class="btn btn-sm btn-success" type="submit" style="width:100%">Save</button>
            </div>
          </form>
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