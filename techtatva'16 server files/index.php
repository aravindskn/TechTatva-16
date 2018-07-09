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
    <title>Online Events-TechTatva'16</title>
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
        #mainbody
        {
            background-color: transparent ;
        }
        .imagestyles
        {
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
            <a class="navbar-brand" href="#index.html">TechTatva'16 <!--| <?php echo $loginStatus ?>--></a>
        </div>
        <!--
        <div class="navbar-collapse collapse" id="navb">

            <ul class="nav navbar-nav navbar-right">
                <li><button type="button" style="margin-top: 0.2cm;margin-right:0.2cm" class="btn btn-default" data-toggle="modal" data-target="#loginModal" >Login</button></li>
                <li><button type="button" style="margin-top: 0.2cm; margin-right:-0.2cm" class="btn btn-default" data-toggle="modal" data-target="#registerModal" >Register</button></li>
                <li><a href="logout.php"><button type="button" style="margin-top: -0.21cm; margin-right:0.1cm" class="btn btn-default" data-toggle="modal" >Log Out</button></a></li>
            </ul>

        </div> -->
    </div>
</nav>
<a href="http://smoked.wearemist.in/">
<img style="margin-top:6em;margin-left: 10em;" src="images/turing-2x%20(1).png">
<p style="margin-top:1.5;margin-left: 8em;font-size: large; color: white">Turing - Smoked</p>
</a>
<a href="https://cyberhawk.iecsemanipal.com">
<img style="margin-top:-17em;margin-left: 78em;" src="images/Cryptoss.png">
<p style="margin-top: -3.0em;margin-left: 60em;font-size: large;color: white">Cryptoss - CyberHawk</p>
</a>
<a href="http://79.170.44.222/siddhartharaokamalakara.com/spotlight/index.php">
<img style="margin-top: -17em;margin-left: 30.4em;" src="images/Alacrity.png">
<p style="margin-top: -3em;margin-left: 23.8em;font-size: large;color: white">Alacrity - Spotlight</p>
</a>
<a href="http://everybodylies.techtatva.in/">
    <img style="margin-top: 10em;margin-left: 10em;" src="images/tt-epsilon%20(1).png">
    <p style="margin-top:0.5em;margin-left: 6.5em;font-size: large;color: white;">Epsilon - Everybody Lies</p>
</a>
<a href="http://cybertronics.techtatva.in/">
    <img style="margin-top: -65em;margin-left: 55.5em;" src="images/energia-1--01.png">
    <p style="margin-top: -21.5em;margin-left: 42.5em;font-size: large;color: white;">Energia - Cybertronics</p>
</a>
<!--
<a href="/instinct">
<img style="margin-top:-17em;margin-left: 55.5em;" src="images/ELECTRIFYLOGO-01.png ">
<p style="margin-top: -3em;margin-left: 43.5em;font-size: large;color: white">Electrific - Instinct</p>
</a>
<a href="mechatron">
<img style="margin-top: 6em;margin-left: 7em;" src="images/mechatron-1--01.png">
<p style="margin-top: 0.2em;margin-left: 3em;font-size: large;color: white;">Mechatron - Ready Set Automate</p>
</a>
<a href="/opus">
    <img style="margin-top: -17.7em;margin-left: 78em;" src="images/acumen.png">
    <p style="margin-top: -3em;margin-left: 59em;font-size: large;color: white">Acumen - Hopeless Opus</p>
</a>
<a href="http://139.59.22.196:1337/player/login">
<img style="margin-top: 6em;margin-left: 7em;" src="images/Bizzmaestro.png">
<p style="margin-top: 0.2em;margin-left: 4.2em;font-size: large;color: white">Bizzmaestro - Wall Street</p>
</a>
<a href="/kraftwagon">
<img style="margin-top: 10em;margin-left: 7em;" src="images/kraftwagon-01.png">
<p style="margin-left: 4.5em; font-size: large; color: white;">Kraftwagen - Lane Switch</p>
</a>
<a href="/constructure">
<img style="margin-top: -17em;margin-left: 30em;" src="images/Constructure.png">
<p style="margin-top: -2.9em;margin-left: 20em;font-size: large; color: white">Constructure - The Virtual Builders</p>
</a>
-->

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
                                    Registration No.:
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
<script src="js/jquery3.js"></script>
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