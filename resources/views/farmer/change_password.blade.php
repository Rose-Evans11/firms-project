@extends('layouts.master_farmer')
@section('title','Change Password')
@section('content')

<div class='container-fluid' style="margin: auto">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
           <h5> Change Password</h5>
           <form method="" action="">
            @csrf
            <div class="col-md-12">
                <label for="txt_oldPass" class="col-lg-12 control-label">Old Password:</label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="txt_oldPass">
                </div>
              </div>
            <div class="col-md-12">
                <label for="txt_newPass" class="col-lg-12 control-label">New Password:</label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="txt_newPass">
                </div>
            </div>
            <div class="col-md-12">
                <label for="txt_confirmPass" class="col-lg-12 control-label">Confirm Password:</label>
                <div class="col-lg-12">
                  <input type="password" class="form-control" id="txt_confirmPass">
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