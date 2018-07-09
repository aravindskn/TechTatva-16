<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("regno", $_SESSION)) {
        
        
        
    } else {
        
        header("Location: index.php");
        
    }
     $link = mysqli_connect("localhost", "root", "", "spotlight");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
        }
$displayQuery = "SELECT * FROM `users` ORDER by Score DESC, ts ASC LIMIT 10";
if($result = mysqli_query($link,$displayQuery))
{}
else
{
    
}
   if( $result_length = mysqli_num_rows($result)){}
      else{}

  
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery-3.1.0.js"></script>


<script>
if (navigator.userAgent.match(/Android|webOS|iPhone|iPod|Blackberry/i)) {
  document.write('<script type=\"text/javascript\" src=\"jsmain-h.js\"><\/script>');
document.write('<link rel="stylesheet" type="text/css" href="css_main_handheld.css">');}
else{
document.write('<link rel="stylesheet" type="text/css" href="css-main.css" media="screen ">')
 document.write('<script type=\"text/javascript\" src=\"js-main.js\"><\/script>'); }
</script>




</head>





<body>


<div class="main">



<div id="leader_board">
<table style="color:white" border="1">
<tr>
  <th>Registration No</th>
  <th>Score</th>
</tr>    
<?php
 
for($i = 0; $i < $result_length; $i++)
{
  
     $rowscala = mysqli_fetch_array($result);
     echo "<tr>";

  echo "<td>".$rowscala['RegistrationNo']."</td><td>".$rowscala['Score']."</td>";
  echo "</tr>";  
}
    
    
?>
    </table>
</div>

<div class="main_body" >
<img id="techtatva_login" src="spotlight.png" />

<div id="div_menu_handheld" class="menu-circle" onclick="handheld_menu()"> <a href="#" id="a_menu_handheld">Menu</a></div>

<div class="circle" id="nav_bar_login">
<button onclick="handheld_menuc()" id="nav_close" ><a href="#" >X</a></button>

   <div class="menu-circle" id="login_play" onclick="play()"> <a href="1.php" >Play</a></div>
   <div class="menu-circle" id="option1" name="logout" onclick="play()"> <a href="index.php?logout=1" >Logout</a></div>
   <div class="menu-circle" id="option2" onclick="show_contact()"> <a href="#" id="toppos" >Contact </br>us</a></div>
   
   <div class="menu-circle" id="option3" onclick="show_rules()"> <a href="#" >Rules</a></div>
   
   <div class="menu-circle" id="option4" onclick="show_about()"> <a href="#" id="toppos1">About</br> us</a></div>
 
</div>





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




<div id="about_us" > <img src="return.png" id="div_close" onclick="hide_overlap_div()"/>
<div class="rule_para">
<p id="rule_para_p">
<h2><u>About us:</u></h2>
<h3>Alacrity, primarily focuses in the field of Electronics and Communication. The category comprises of events like a treasure hunt by making your own antenna, creating patterns using lasers, lens and mirrors, making metal detectors, using microcontrollers which encourages students to innovate. Finally, to battle your wits in the online technical event.
</h3></p>
</div>


</div>


</div>








</body>
</html>