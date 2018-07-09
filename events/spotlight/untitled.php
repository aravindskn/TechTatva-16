<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("regno", $_SESSION)) {
        
        //echo "<p>Logged In! <a href='index.php?logout=1'>Log out</a></p>";
        
    } else {
        
        header("Location: index.php");
        
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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

 <?php
    $link = mysqli_connect("localhost", "root", "techTatva!6", "alacrity");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
        }
     $query = "SELECT * FROM `users` WHERE regno ='".$_SESSION['regno']."' LIMIT 1";
     $result = mysqli_query($link,$query);
     $row = mysqli_fetch_array($result);
     $query2 = "SELECT * FROM `questions` WHERE Level = '".$row['Score']."' LIMIT 1";
     $result2 = mysqli_query($link,$query2);
     $row2 = mysqli_fetch_array($result2);
     if($_POST['answer']==$row2['answer'])
     {
        echo "<script type='text/javascript'>alert('Congratulations!!Level cleared');</script>";
        header("Location: 2.php");
     }

?>
<script type="text/javascript">$("#formsubmit").submit(function(e) {
    e.preventDefault();
});</script>
  
 <body  onload="<?php foreach($arr as $i)
	 print <<< here
 onload_level($i,$clue_image,$i);
here;
 ?>  " >


 
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



<div id="about_us" > <img src="return.png" id="div_close" onclick="hide_overlap_div()"/></div>


</div>



<div class="main">
<div id="left_main_div">

<div class="menu-circle-game" id="option1_game" onclick="show_rules()"> <a href="#" style="top:13px;">Rules</a></div>
<div class="menu-circle-game" id="option2_game" onclick="show_contact()"> <a href="#" id="toppos2">Contact</br>us</a></div>
<div class="menu-circle-game" id="option3_game" onclick="show_about()"> <a href="#" id="toppos2">About</br> us</a></div>
<div class="menu-circle-game" id="option_game_logout" onclick="show_rules()"> <a href="index.php?logout=1" id="toppos1">Logout</a></div></br>


<div id="image_clue_div"><center><img id="image_clue" src="#"/></center></div>

</div>

<div id ="container">
<?php
 
for($i=1;$i<26;$i++)
print <<< here
<div id ="animate_$i" class="divanimate">
<img id="image_$i" class="a" src="#"/>
<img id="cover_$i"  class="imgcover"/>
</div>
here;
?>
</div>



<div id="question_div">
<p id="p_question" name="p_question" > <?php echo $row2['Question']; ?> </p>
    <form method="post" id="formsubmit">
<input id="input_answer" placeholder="Your Answer" name="answer" />
<button id="submit_button" class="button_desgin" onclick="after_submit('<?php echo $main_image; ?>','<?php echo $div_num; ?>','<?php echo $clue_image; ?>','<?php echo $question_new_level; ?>','<?php echo $score; ?>')">Enter</button>
    </form>
</div>








</body>
</html>