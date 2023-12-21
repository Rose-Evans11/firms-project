@extends('layouts.master_farmer')
@section('title','Contact Us')
@section('content')
<div class="container-fluid">
    <div class="row" style="padding-top:50px; padding-left:50px; padding-right:50px">
        <div class="col-md-6">
            <br />
            <address>
                Thank you for considering FIRMS. We would love to hear from you! <br />
                Please find our contact information below:<br />
                Office Address: New City Hall, Tanauan City Batangas<br />
                Phone Number: 09171547444 / 545-0000 <br />
                Email: techevans11@gmail.com <br />
                Business Hours: Monday - Friday: 8:00 AM - 5: 00 PM <br />
                Saturday - Sunday: Closed <br />
            </address>
            <address>
                 <a href="mailto:techevans11@gmail.com" class="btn btn-success btn-s mt-1">Send us a messages! </a><br />
            </address>
            <p> </p>
        </div>
        <div class="col-md-6">
            <img src="{{asset('Images/img_contact.png')}}" class="img-fluid" alt="" />
        </div>
</div>
@endsection