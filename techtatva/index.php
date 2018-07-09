<?php
session_start();
$loginStatus="You are not logged in";
if(isset($_SESSION['userid']))
    $loginStatus="Hi ".$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Events-Techtatva'16</title>
    <link rel="icon" href="images/titlelogo.png" type="image/png" sizes="16x16">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        #mainbody
        {
            background-image: url("images/thumb-1920-245.jpg");
            position: absolute;
            align-items: center;
            background-size: cover;
        }
        #mainheader
        {
            background-color: brown;
            color: floralwhite;
        }

        #mainbody{
            background-color: transparent ;
        }
        .imagestyles{
            border: thick yellow;
        }

        #f
        {
            background-color: brown;

        }

    </style>
</head>


<body id="mainbody">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navb">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#index.html">TechTatva'16 | <?php echo $loginStatus ?></a>
        </div>
        <div class="navbar-collapse collapse" id="navb">

            <ul class="nav navbar-nav navbar-right">
                <li><button type="button" style="margin-top: 0.2cm;margin-right:0.2cm" class="btn btn-default" data-toggle="modal" data-target="#loginModal" >Login</button></li>
                <li><button type="button" style="margin-top: 0.2cm; margin-right:-0.2cm" class="btn btn-default" data-toggle="modal" data-target="#registerModal" >Register</button></li>
                <li><a href="logout.php"><button type="button" style="margin-top: -0.21cm; margin-right:0.1cm" class="btn btn-default" data-toggle="modal" >Log Out</button></a></li>
            </ul>

        </div>
    </div>
</nav>

<a href="#index.html">
<img style="margin-top: 10em;margin-left: 7em;" src="http://placehold.it/150x150">
<p style="margin-left: 7em; font-size: large; color: white; font-style: bold">Kraftwagen</p>
</a>
<a href="#index.html">
<img style="margin-top: -17em;margin-left: 32em;" src="http://placehold.it/150x150">
<p style="margin-top: -2.9em;margin-left: 26.5em;font-size: large; color: white">Constructure</p>
</a>
<a href="#index.html">
<img style="margin-top:-16.2em;margin-left: 56em;" src="http://placehold.it/150x150">
<p style="margin-top: -3.2em;margin-left: 60.5em">Event</p>
</a>
<a href="#index.html">
<img style="margin-top: -17.2em;margin-left: 78em;" src="http://placehold.it/150x150">
<p style="margin-top: -3.7em;margin-left: 82em">Event</p>
</a>
<a href="#index.html">
<img style="margin-top: 6em;margin-left: 7em;" src="http://placehold.it/150x150">
<p style="margin-top: 0.2em;margin-left: 11em">Event</p>
</a>
<a href="#index.html">
<img style="margin-top: -16.5em;margin-left: 32.5em;" src="http://placehold.it/150x150">
<p style="margin-top: -3.4em;margin-left: 36.5em">Event</p>
</a>
<a href="#index.html">
<img style="margin-top: -16.7em;margin-left: 56em;" src="http://placehold.it/150x150">
<p style="margin-top: -3.5em;margin-left: 60.5em">Event</p>
</a>
<a href="#index.html">
<img style="margin-top: -16.7em;margin-left: 78em;" src="http://placehold.it/150x150">
<p style="margin-top: -3.5em;margin-left: 82em">Event</p>
</a>

<!-- Defining the Modals below. Hope its not too confusing. -->

<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Login</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-offset-2">
                        <form class="form-horizontal" action="login.php" method="post" id="loginForm" onsubmit="return login()">
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    Email ID:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="email" id="emailField">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    Password:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password" id="passwordField">
                                </div>
                            </div>
                            <div class="col-sm-offset-5 col-xs-offset-4">
                                <button type="submit" class="btn btn-sm btn-success" id="loginButton">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Registration</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-offset-2">
                        <form class="form-horizontal" method="post" id="registerForm" onsubmit="return false">
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    Name:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="name" id="regName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    College:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="college" id="regCollege">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    Reg. No.:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="regno" id=regRegNo>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    Email:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="email" class="form-control" name="email" id="regEmail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    Password:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password" id="regPassword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-12">
                                    Retype Password:
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="confirmPass" id="regConfirmPass">
                                </div>
                            </div>
                            <div class="col-sm-offset-5 col-xs-offset-4">
                                <button type="submit" class="btn btn-sm btn-success" id="regSubmit" onclick="register()">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    function login()
    {
        document.getElementById('loginButton').innerHTML="Logging in...";
        var datastring=$("#loginForm").serialize();
        $.ajax({
            url: 'login.php',
            type: 'POST',
            dataType: 'json',
            data: {
                email: $('#emailField').val(),
                password: $('#passwordField').val()
            },
        })
                .done(function(response) {
                    if(response.status==="true")
                    {
                        alert('Login successful!');
                        location.reload();
                    }
                    else
                        alert("Login failed. Please try again");
                })
                .fail(function() { console.log("error"); })
                .always(function(x,y,z) { console.log(x); document.getElementById('loginButton').innerHTML="Login"; });


        return false;
    }
    function register()
    {
        var regName=$("#regName").val();
        var regCollege=$("#regCollege").val();
        var regRegNo=$("#regRegNo").val();
        var regEmail=$("#regEmail").val();
        var regPassword=$("#regPassword").val();
        var regConfirmPass=$("#regConfirmPass").val();

        //Verification
        var x = $("#registerForm").serializeArray();
        var proceed=true;
        $.each(x, function(i, field){
            if(field.value.length<2)
                proceed=false;
        });
        if(!proceed)
        {
            alert('No fields can be left blank');
            return false;
        }

        if(regName.length<5 || regRegNo.length<5)
        {
            alert('Name and Registration Number must be at least 5 characters');
            return false;
        }

        if(/\S+@\S+\.\S+/.test('regEmail'))
        {
            console.log(regEmail);
            alert('Invalid Email ID');
            return false;
        }

        if(regPassword.length<6)
        {
            alert('Password must be at least 6 characters');
            return false;
        }
        if(!/[A-Z]/.test(regPassword) || !/[a-z]/.test(regPassword) || !/[0-9]/.test(regPassword))
        {
            alert('Password must have 1 upper case, lower case and number character');
            return false;
        }
        if(regPassword!==regConfirmPass)
        {
            alert("The two passwords don't match");
            return false;
        }

        console.log(regRegNo);

        $("#regSubmit").text("Registering...");
        $.ajax({
            url: 'register.php',
            type: 'POST',
            dataType: 'json',
            data: {
                name: regName,
                college: regCollege,
                regno: regRegNo,
                email: regEmail,
                password: regPassword,
                confirmPass: regConfirmPass
            },
        })
                .done(function(response) {
                    if(response.status==="true")
                    {
                        alert('Registration successful!');
                        location.reload();
                    }
                    else
                        alert(response.message + "\nPlease try again");
                })
                .fail(function() { console.log("error"); })
                .always(function(x,y,z) { console.log(x); $("#regSubmit").text("Register");});



        return false;
    }
</script>

</body>
</html>