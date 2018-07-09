<?php
if (isLoggedIn()) {

    header('Location: ' . HOMEPAGE . '/dashboard');
    die();
}

?>

<div class="container">
    <div id="signinbox" style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
            </div>

            <div style="padding-top:30px" class="panel-body">

                <form id="signin" method="POST" action="<?= HOMEPAGE; ?>/api/signin" class="form-horizontal"
                      role="form">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="email" value=""
                               placeholder="username or email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password"
                               placeholder="password">
                    </div>


                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="btn-signup" value="Sign In" class="btn btn-info">
                        </div>
                    </div>

                    <div class="ajax-response alert"></div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Don't have an account!
                                <a href="#" onClick="$('#signinbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <div id="signupbox" style="display:none; margin-top:50px"
         class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
            </div>
            <div class="panel-body">
                <form id="signup" method="POST" action="/api/signup" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Confirm Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="btn-signup" value="Sign Up" class="btn btn-info">
                        </div>
                    </div>


                    <div class="ajax-response alert"></div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                Already have an account ?
                                <a href="#" onClick="$('#signupbox').hide(); $('#signinbox').show()">
                                    Sign In
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>

</div>


<script type="text/javascript">

    var signup = $('#signup');
    signup.submit(function (ev) {
        $.ajax({
            type: signup.attr('method'),
            url: signup.attr('action'),
            data: signup.serialize(),
            success: function (data) {
                $(signup).find('.ajax-response').removeClass('alert-danger').addClass('alert-success').html(data.message);
                window.location.replace(data.redirect);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $(signup).find('.ajax-response').removeClass('alert-success').addClass('alert-danger').html(xhr.responseJSON.message);
            }


        });

        ev.preventDefault();
    });


    var signin = $('#signin');
    signin.submit(function (ev) {
        $.ajax({
            type: signin.attr('method'),
            url: signin.attr('action'),
            data: signin.serialize(),
            success: function (data) {
                $(signin).find('.ajax-response').removeClass('alert-danger').addClass('alert-success').html(data.message);
                window.location.replace(data.redirect);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $(signin).find('.ajax-response').removeClass('alert-success').addClass('alert-danger').html(xhr.responseJSON.message);
            }

        });

        ev.preventDefault();
    });


</script>
    