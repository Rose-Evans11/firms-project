@extends('layouts.master_farmer')
@section('title','About Page')
@section('content')
<div class='container-fluid' style="padding: 5% 7% 5%">
    <div class="row">
        <div class="col-md-6">
            <br />
            <br />
            <p> Welcome to our FIRMS! We understand the unique challenges and risks that come with farming. Our mission is to provide help and risk management solutions to protect your agricultural investments. We believe that farming is not just a job, but a way of life. That's why we are committed to providing you our best services. We take the time to get to know you and your farm.</p>
            <br />
            <br />
            <center> <a href="mailto:techvans11@gmail.com" class="btn btn-success btn-ms mt-1">Get started! </a><br /></center> 
        </div>
        <div class="col-md-6">
            
            <img src="{{ asset('images/img_about.png') }}" class="img-fluid" alt="" />
        </div>
    </div>
</div>
@endsection
