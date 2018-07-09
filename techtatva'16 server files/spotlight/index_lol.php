<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
<script type="text/javascript" src="jquery-3.1.0.js"></script>
<script>
if (navigator.userAgent.match(/Android|webOS|iPhone|iPod|Blackberry/i)) {
  document.write('<script type=\"text/javascript\" src=\"jsmain-h.js\"><\/script>');
document.write('<link rel="stylesheet" type="text/css" href="css_main_handheld.css">');}
else{
document.write('<link rel="stylesheet" type="text/css" href="css-main.css" media="screen ">')
 document.write('<script type=\"text/javascript\" src=\"js-main.js\"><\/script>'); }
 
$(document).ready(function(){ 
 $("#techtatva").hide(); 
$("#nav_bar").hide();});
</script>
</head>

<body onload="onloadanim()">


<div class="main">





<div class="main_body" >
<img id="techtatva" src="techtatva.png" />

<?php
 
for($i=1;$i<37;$i++)
print <<< here
<div id ="animate_$i" class="divanimate">
</div>
here;
    ?>
    
    <?php
     session_start();

    $error = "";    

    if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";  
        
    } else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
        
        header("Location: after_login.php");
        
    }

    if (array_key_exists("submit", $_POST)) {
        
        $link = mysqli_connect("localhost", "root", "techTatva!6", "alacrity");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
        
        if($_POST['password_c']!=$_POST['password'])
        {
            $error .= "The passwords do not match!";
        }
        
        if (!$_POST['parname']) {
            
            $error .= "Please enter your name!<br>";
            
        } 
        
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        } 
        if (!$_POST['regno']) {
            
            $error .= "Enter your registration  number<br>";
            
        } 
        if (!$_POST['mobile']) {
            
            $error .= "Mobile number is mandatory<br>";
            
        } 
        if (!$_POST['branch']) {
            
            $error .= "Please enter your branch<br>";
            
        } 
        if(!$_POST['email'])
        {
            $error .= "An email address is required!";
        }
        
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
            if ($_POST['signUp'] == '1') {
            
                $query = "SELECT id FROM `users` WHERE RegistrationNo = '".mysqli_real_escape_string($link, $_POST['regno'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "The user is already registered.";

                } else {

                    $query = "INSERT INTO `users` (`RegistrationNo`, `password`,`name`,`mobile`,`branch`,`email`) VALUES ('".mysqli_real_escape_string($link, $_POST['regno'])."', '".mysqli_real_escape_string($link, $_POST['password'])."', '".mysqli_real_escape_string($link, $_POST['parname'])."', '".mysqli_real_escape_string($link, $_POST['mobile'])."', '".mysqli_real_escape_string($link, $_POST['branch'])."','".mysqli_real_escape_string($link,$_POST['email'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);

                        $_SESSION['id'] = mysqli_insert_id($link);

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);

                        } 

                        header("Location: after_login.php");

                    }

                } 
                
            }
        }
    }
    if(array_key_exists("logIn",$_POST))
    {
        if(!$_POST['regno'])
        {
            $error .= "Please enter your registration number";
        }
        if(!$_POST['password'])
        {
            $error .= "Password is required!";
        }
        if($error!="")
        {
            echo "<p>There were errors in your forms!</p>".$error;
        }
        else
        {
                               $query = "SELECT * FROM `users` WHERE RegistrationNo = '".mysqli_real_escape_string($link, $_POST['regno'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['id']).$_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['id'] = $row['id'];
                            
                            if ($_POST['stayLoggedIn'] == '1') {

                                setcookie("id", $row['id'], time() + 60*60*24*365);

                            } 

                            header("Location: after_login.php");
                                
                        } else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
            
        }
    }
?>

<div id="div_menu_handheld" class="menu-circle" onclick="handheld_menu()"> <a href="#" id="a_menu_handheld">Menu</a></div>

<div class="circle" id="nav_bar">
<b><button onclick="handheld_menuc()" id="nav_close" ><a href="#" >X</a></button>
   <div class="menu-circle" id="option1" onclick="show_contact()"> <a href="#" id="toppos1">Contact </br>us</a></div>
   <div class="menu-circle" id="option2" onclick="show_register()"> <a href="#" id="toppos1" >Register</a></div>
   
   <div class="menu-circle" id="option3" onclick="show_rules()"> <a href="#" id="toppos1">Rules</a></div>
   
   <div class="menu-circle" id="option4" onclick="show_about()"> <a href="#" id="toppos1">About</br> us</a></div>
 </b>
</div>





</div>

<div id="log_box">
<fieldset id="side_log">
    <form method="post">
<center><input type="text" placeholder="Enter Username" name="regno" id="log_username" class="sidelog"/>
<input type="password"   placeholder="Enter Password" name="password" id="real_pass" class="sidelog"/>
</br><button id="button_log" name="logIn" > GO </button></center>
    </form>
</fieldset>

</div>
</div>


<div class="overlap" id="overlap">

<div id="contact_us" > <img src="return.png" id="div_close" onclick="hide_overlap_div()"/>

<div class="rule_para">
<p class="rule_para_p"></br></br>
<h2><u>Contact us:</u></h2>
<h3>
Vidisha:  &nbsp &nbsp&nbsp 9591362927</br>	
Aditya:   &nbsp &nbsp  &nbsp 9663593376</br>
R Ashwin: &nbsp9035553411	</br>
</h3>
</p>
</div>
</div>

<div id="register"  > <img src="return.png" id="div_close" onclick="hide_overlap_div()"/>
<form method="post" action="#">
<br/>
<center><h2 style="color:white;">Register:</h2></center>
<center><input type="text" placeholder="Enter Username" name="parname" id="reg_username" class="reginput"/></br>
<input type="text" maxlength="9" placeholder="Enter Reg no." name="regno" id="log_reg" class="reginput"/><br/>

<input type="password"   placeholder="Enter Password"   name="reg_password"   id="real_pass0"  style="display:none;" class="reginput"/>

<input type="password"   placeholder="Enter Password"   name="password"   id="real_pass1"  class="reginput"/><br>
<input type="password"   placeholder="Confirm Password" name="password_c" id="real_pass2" class="reginput"/><br/>

<input type="text"  placeholder="Enter Contact no." name="mobile" id="log_reg" class="reginput"/><br/>
<input type="text" placeholder="Enter Branch" name="branch" id="log_branch" class="reginput"/><br/>
<input type="email"  placeholder="Enter Email" name="email" id="log_email" class="reginput"/><br/><br/>
<input type="checkbox" name="stayLoggedIn" value=1> 
<input type="hidden" name="signUp" value="1">
<center><button type="submit" name="submit" >Submit </button></center></center>
</form>
</div>


<div id="rules"  > <img src="return.png" id="div_close" onclick="hide_overlap_div()"/></br>

<div class="rule_para">
<p id="rule_para_p">
<h2><u>Rules:</u></h2>
<h3>1.	The quiz comprises of 37 questions, 36 questions and a MEGA question.</br></br>
2.	Whenever you answer a question correctly, a tile will unveil showing 
&nbsp a part of the image relating to the mega question. Similarly you will
&nbsp have to answer all the 36 questions to unveil all the 36 tiles, which are the part of the image relating to the MEGA question.</br>
</br>3.	 All the answers should not contain any abbreviations.
</h3></p>
</div>

</div>



<div id="about_us" > <img src="return.png" id="div_close" onclick="hide_overlap_div()"/></div>


</div>









</body>
</html>