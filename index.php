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
    <title>TechTatva Online Events</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        #main {
            background-image: url("stars_texture2960.jpg");
        }
        #mainheader{
            background-color: brown;
            color: floralwhite;
        }

        #mainbody{
            background-color: #5e5e5e;
        }
        .imagestyles{
            border: thick yellow;
        }
        #f{
            background-color: brown;

        }
    </style>
    <script type="text/javascript" src="js/jquery3.js"></script>
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
            <a class="navbar-brand">TechTatva | <?php echo $loginStatus ?></a>
        </div>
        <div class="navbar-collapse collapse" id="navb">
           <!-- <ul class="nav navbar-nav">
                <li><a href="#"> Home</a></li>
                <li><a href="#">Event1</a></li>
                <li><a href="#"> Event2 </a></li>
                <li><a href="#">Event3</a> </li>
            </ul> -->
            <ul class="nav navbar-nav navbar-right">
               <li><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#loginModal">Login</button>
                </li>
                <li><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#registerModal">Register</button>
                </li>
                <li><a href="logout.php"><button type="button" class="btn btn-danger btn-sm">Logout</button></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="jumbotron" id="mainheader">
    <div class="container-fluid">
        <h1 class="h1 text-center text-capitalize">Tech Tatva Online Events</h1>
    </div>
</header>
<div class="row" id="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <h3><a href="kraftwagon">Kraftwagon</a></h3>
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS0Cq5gqS2zDCeNlgf4jGoOF3YqWGwrgwRj3WbJmm3zoLFS2fc0"
                 class="img-responsive imagestyles">
        </div>
        <div class="col-sm-6 col-xs-12">
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS0Cq5gqS2zDCeNlgf4jGoOF3YqWGwrgwRj3WbJmm3zoLFS2fc0"
                 class="img-responsive imagestyles">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS0Cq5gqS2zDCeNlgf4jGoOF3YqWGwrgwRj3WbJmm3zoLFS2fc0"
                 class="img-responsive imagestyles">
        </div>
        <div class="col-sm-6 col-xs-12">
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS0Cq5gqS2zDCeNlgf4jGoOF3YqWGwrgwRj3WbJmm3zoLFS2fc0"
                 class="img-responsive imagestyles">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-4 col-xs-12">
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS0Cq5gqS2zDCeNlgf4jGoOF3YqWGwrgwRj3WbJmm3zoLFS2fc0"
                 class="img-responsive imagestyles">
        </div>
        <div class="col-sm-6 col-xs-12">
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS0Cq5gqS2zDCeNlgf4jGoOF3YqWGwrgwRj3WbJmm3zoLFS2fc0"
                 class="img-responsive imagestyles">
        </div>
    </div>
</div>
<br> <br>
<footer class="jumbotron" id="f">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="h2 text-success text-center" style="color: floralwhite">Passionately Curious!</h2>
            </div>
        </div>
    </div>
</footer>

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