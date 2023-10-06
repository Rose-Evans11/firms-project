@extends('layouts.master_farmer_landing')
@section('title','Contact Us')
@section('content')
<div class="container-fluid">
    <div class="row" style="padding:80px">
        <div class="col-md-6">
            <h2> <b> Contact Us</b> </h2>
            <br />
            <address>
                Thank you for considering FIRMS. We would love to hear from you! <br />
                Please find our contact information below:<br />
                Office Address: 1234 Tanauan City Batangas<br />
                Phone Number: 09171547444 / 545-0000 <br />
                Email: fifms.services@gmail.com <br />
                Business Hours: Monday - Friday: 8:00 AM - 5: 00 PM <br />
                Saturday - Sunday: Closed <br />
            </address>
            <address>
                 <a href="mailto:Support@example.com" class="btn btn-success btn-s mt-1">Send us a messages! </a><br />
            </address>
            <p> </p>
        </div>
        <div class="col-md-6">
            <img src="{{asset('Images/img_contact.png')}}" class="img-fluid" alt="" />
        </div>
</div>
@endsection