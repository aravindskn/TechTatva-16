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
    unset($_SESSION['arr']);
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


 <?php
    $link = mysqli_connect("localhost", "root", "techTatva!6", "alacrity");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
        }
        echo $_SESSION['regno'];
        //$_SESSION['arr'] = array();
     $query = "SELECT * FROM `users` WHERE RegistrationNo ='".$_SESSION['regno']."' LIMIT 1";
     echo $_SESSION['regno'];
     $result = mysqli_query($link,$query);
     $row = mysqli_fetch_array($result);
     $queryForDigitArray = "SELECT * FROM `questions` WHERE 1";
    $resultDigitArray = mysqli_query($link,$queryForDigitArray);
    while($rowForDigitArray= mysqli_fetch_array($resultDigitArray))
    {
    if($row['Score']>=$rowForDigitArray['Level'])
        {
            $_SESSION['arr'][] = $rowForDigitArray['digit'];
        }
    }
     $query2 = "SELECT * FROM `questions` WHERE Level = '".$row['Score']."' LIMIT 1";
     $result2 = mysqli_query($link,$query2);
     $row2 = mysqli_fetch_array($result2);
     echo $row['Score'];
     if($row['Score']!=10)
     {
        header("Location: ".$row['Score'].".php");
     }
     else{
           $_POST['answer'] = preg_replace('/\s*/', '', $_POST['answer']);
// convert the string to all lowercase
        $_POST['answer'] = strtolower($_POST['answer']);
        if($_POST['answer']=="")
        {

        }

     
     else if($_POST['answer']==$row2['answer'])
     {
            $score = $row['Score'];            
            $score = $score + 1;
            
            $query3 = "SELECT * FROM `questions` WHERE Level = '".$score."' LIMIT 1";
            
            $questionquery = mysqli_query($link,$query3);
            
            $questions =mysqli_fetch_array($questionquery);
            
            $question_new_level = $questions['Question'];
            
            echo $question_new_level;
            
            $clue_image= $questions['Image'];
            
            $main_image = $questions['MainImage'];
            

           $_SESSION['arr'][] = $questions['digit'];
            
            print_r($_SESSION['arr']);
            
            $div_num = $questions['digit'];
            
            echo "<h2>$score</h2>";
            
            //update score
            $query4 = "UPDATE `users` SET Score = '".$score."',ts = now() WHERE RegistrationNo='".$_SESSION['regno']."'";
            
            if($scorequery = mysqli_query($link,$query4))
                
            {
                echo "Score query successful";
            }
            else
            {
                echo "Score update not a success";
            }
        echo "<script type='text/javascript'>alert('Congratulations!!Level cleared');</script>";
        header("Location: 11.php");
     }
     else
     {
        echo "<script type='text/javascript'>alert('Wrong Answer!! Please try again');</script>";
     }
}
?>



</head>


<script type="text/javascript">$("#formsubmit").submit(function(e) {
    e.preventDefault();
});</script>
  
 <body  onload="<?php foreach($_SESSION['arr'] as $i)
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
R Ashwin: &nbsp9035553411   </br>
</h3>
</p>
</div>
</div>


<div id="rules"  > <img src="return.png" id="div_close" onclick="hide_overlap_div()"/></br>
<div class="rule_para">
<p id="rule_para_p">
<h2><u>Rules:</u></h2>
<h3>1.  The quiz comprises of 37 questions, 36 questions and a MEGA question.</br></br>
2.  Whenever you answer a question correctly, a tile will unveil showing 
&nbsp a part of the image relating to the mega question. Similarly you will
&nbsp have to answer all the 36 questions to unveil all the 36 tiles, which are the part of the image relating to the MEGA question.</br>
</br>3.  All the answers should not contain any abbreviations.
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



<div class="main">
<div id="left_main_div">

<div class="menu-circle-game" id="option1_game" onclick="show_rules()"> <a href="#" style="top:13px;">Rules</a></div>
<div class="menu-circle-game" id="option2_game" onclick="show_contact()"> <a href="#" id="toppos2">Contact</br>us</a></div>
<div class="menu-circle-game" id="option3_game" onclick="show_about()"> <a href="#" id="toppos2">About</br> us</a></div>
<div class="menu-circle-game" id="option_game_logout"> <a href="index.php?logout=1" id="toppos1">Logout</a></div></br>


<div id="image_clue_div"><center><img id="image_clue" src="no.png"/></center></div>

</div>

<div id="container">
<div id="animate_1" class="divanimate">
<img id="image_1" class="a" src=".jpeg">
<img id="cover_1" class="imgcover">
</div><div id="animate_2" class="divanimate">
<img id="image_2" class="a" src="#">
<img id="cover_2" class="imgcover">
</div><div id="animate_3" class="divanimate">
<img id="image_3" class="a" src="#">
<img id="cover_3" class="imgcover">
</div><div id="animate_4" class="divanimate">
<img id="image_4" class="a" src="4.png">

</div><div id="animate_5" class="divanimate">
<img id="image_5" class="a" src="5.png">

</div><div id="animate_6" class="divanimate">
<img id="image_6" class="a" src="6.png">

</div><div id="animate_7" class="divanimate">
<img id="image_7" class="a" src="#">
<img id="cover_7" class="imgcover">
</div><div id="animate_8" class="divanimate">
<img id="image_8" class="a" src="#">
<img id="cover_8" class="imgcover">
</div><div id="animate_9" class="divanimate">
<img id="image_9" class="a" src="#">
<img id="cover_9" class="imgcover">
</div><div id="animate_10" class="divanimate">
<img id="image_10" class="a" src="10.png">

</div><div id="animate_11" class="divanimate">
<img id="image_11" class="a" src="11.png">

</div><div id="animate_12" class="divanimate">
<img id="image_12" class="a" src="#">
<img id="cover_12" class="imgcover">
</div><div id="animate_13" class="divanimate">
<img id="image_13" class="a" src="#">
<img id="cover_13" class="imgcover">
</div><div id="animate_14" class="divanimate">
<img id="image_14" class="a" src="#">
<img id="cover_14" class="imgcover">
</div><div id="animate_15" class="divanimate">
<img id="image_15" class="a" src="#">
<img id="cover_15" class="imgcover">
</div><div id="animate_16" class="divanimate">
<img id="image_16" class="a" src="16.png">

</div><div id="animate_17" class="divanimate">
<img id="image_17" class="a" src="#">
<img id="cover_17" class="imgcover">
</div><div id="animate_18" class="divanimate">
<img id="image_18" class="a" src="#">
<img id="cover_18" class="imgcover">

</div><div id="animate_19" class="divanimate">
<img id="image_19" class="a" src="#">
<img id="cover_19" class="imgcover">
</div><div id="animate_20" class="divanimate">
<img id="image_20" class="a" src="20.png">

</div><div id="animate_21" class="divanimate">
<img id="image_21" class="a" src="#">
<img id="cover_21" class="imgcover">
</div><div id="animate_22" class="divanimate">
<img id="image_22" class="a" src="#">
<img id="cover_22" class="imgcover">
</div><div id="animate_23" class="divanimate">
<img id="image_23" class="a" src="#">
<img id="cover_23" class="imgcover">
</div><div id="animate_24" class="divanimate">
<img id="image_24" class="a" src="24.png">

</div><div id="animate_25" class="divanimate">
<img id="image_25" class="a" src="25.png">

</div>
</div>




<div id="question_div">
<p id="p_question" name="p_question" > <?php echo $row2['Question']; ?> </p>
    <form method="post" id="formsubmit">
<input id="input_answer" placeholder="Your Answer" name="answer" />
<button id="submit_button" class="button_desgin">Enter</button>
    </form>
</div>








</body>
</html>