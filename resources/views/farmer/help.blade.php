@extends('layouts.master_farmer')
@section('title','Help')
@section('content')
<style>
    .accordion {
        background-color: white;
        color: #111613;
        cursor: pointer;
        padding: 20px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

        .active, .accordion:hover {
            background-color: #45822E;
            color: white;
          
        }

    .panel {
        padding: 20px;
        display: none;
        color: white;
        background-color: #6CA26D;
        overflow: hidden;
    }
</style>
<div class="container-fluid">
    <div class="row" style="padding:80px 150px">
        <div class="col-md-12">
            <h3> <b>Frequently Ask Question </b> </h3>
            <br />
            <button class="accordion"> How to create an account? </button>
            <div class="panel">
                <p>To create an account the farmers need to go to the main office because the admin are only allowed to create their account. The farmers should ready the requirement needed and pass it to the admins.</p>
            </div>
    
            <button class="accordion"> How to update profile information? </button>
            <div class="panel">
                <p>
                    The admin should be the one who will give the username and password to the user. <br />
                    To update the profile information <br />
                    (1) The user need to log in, click the log in button then choose the user.<br />
                    (2) Fill up the user email and password. Then click log in <br />
                    (3) In the upper right corner click the profile icon and choose the profile<br />
                    (4) Fill up the profile information <br />
                    *Full name, *Email address, *Address, *Your photo<br />
                    (5) Click save changes
                </p>
            </div>
    
            <button class="accordion">How to file a insurance report? </button>
            <div class="panel">
                <p> The user must first have own username and password and then after that they can able to perform submitting their report.<br />
                (1) The user need to log in and fill in the email and password<br />
                (2) Click the left menu<br />
                (3) You will see the create report, click it.<br />
                (4) After that the user can fill up about the information damage report properties.
                The user need to fill up this following :<br />
                *Name, *Barangay *Farm Location, *Hectares, *Type of Crop, *Stage Growth, *Additonal Information, *Insert the damage crop photo<br />
                (5) Click the submit button 
                </p>
            </div>
            <button class="accordion"> How to check a insurance report? </button>
            <div class="panel">
                <p>
                    To check report history follow this step:<br />
                    Click dashboard<br />
                    When you click dashboard you'll see the pending, process and close<br />
                    *In pending section it means that the user will see the report they created is not yet view by the admin.<br />
                    *In process section you'll see the report is on going status, it means that the agriculturist is already view and reviewing the report<br />
                    *In close section it means that the admin have already validation to the report that the user created.
                </p>
            </div>
    
            <button class="accordion"> How to change password? </button>
            <div class="panel">
                <p>
                    To change password follow this step :<br />
                    (1) The user need to log in <br />
                    (2) At the right upper corner, click the profile icon.<br />
                    (3) Click change password<br />
                    (4) Fill up the the old and new password<br />
                    (5) Click submit
                </p>
            </div>
    
            <button class="accordion">How to contact us? </button>
            <div class="panel">
                <p>
                    Once you visit the website in navigation bar, click it, it will show fully location. Crofters have its own email "crofterstanauan@gmail.com" through that email the user can communicate to us.
                    If the user have question they call also fill up the form including the following:<br />
                    *Full name, *Address, *Email, *Phone number, *Message<br />
                    Then click the submit button.
                </p>
            </div>
            <script>
                var acc = document.getElementsByClassName("accordion");
                var i;
    
                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function () {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.display === "block") {
                            panel.style.display = "none";
                        } else {
                            panel.style.display = "block";
                        }
                    });
                }
            </script>
        </div>
</div>
@endsection