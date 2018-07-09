<html>
<head>
    <meta charset="utf-8">
    <title> Constructure </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <header>
        <nav>
            <ul>
                <li class="nav-list-01"><a href="home.html" class="header-nav-anchor"> Home </a></li>
                <li class="nav-list-01"><a href="instructions.html" class="header-nav-anchor"> Instructions </a></li>
                <li class="nav-list-01"><a href="rules.html" class="header-nav-anchor"> Rules </a></li>
                <li class="nav-list-01"><a href="typesofwalls.html" class="header-nav-anchor"> Types Of Wall </a></li>
            </ul>
        </nav>
    </header>
</head>


<body>

    <?php
/**
 * Created by PhpStorm.
 * User: Aravind Sreekumar
 * Date: 27-09-2016
 * Time: 08:47
 */
	//error_reporting(E_ERROR);
	session_start();
	if($_SESSION['login']=="logged_in"){
        define('DB_HOSTNAME','localhost');
        define('DB_USER','root');
        define('DB_PASS','');
        define('DB_NAME','constructure');
        $link=mysqli_connect(DB_HOSTNAME,DB_USER,DB_PASS,DB_NAME)
        or die("Error connecting to the database");
    }
    else{
        session_unset();
        session_destroy();
        header("Location:home.html");
    }

    ?>
    <div id="first-div">

        <input style="margin-top: -5em;" type="button" name="previous-button" value="Previous" id="first-div-previous-button">
        <input style="margin-top: -5em;" type="button" name="next-button" value="Next" id="first-div-next-button">
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php
                $sql="SELECT question FROM questions";
                $result=$link->query($sql);

                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        echo " " .$row["question"];
                    }
                }
            ?>
        <input style="margin-right: 50%;margin-left: 50%; margin-top: 25em; width: 50%" type="text" placeholder="Answers" name="answer">
            <?php
                $query=mysql_query("SELECT * FROM questions WHERE question='$question' and answer='$answer' ");
                $numrows=mysql_num_rows($query);

                if($numrows!==0)
                {

                    while($row = mysql_fetch_assoc($query))
                    {
                        $dbquestion = $row['question'];
                        $dbanswer = $row['answer'];
                    }
                    if($question==$dbquestion&&$answer==$dbanswer)
                    {
                        echo "You Have Answered Right!!!!!!";
                        $_SESSION['question'] = $question;
                        $_SESSION['answer'] = $answer;
                    }
                    else
                    {
                        echo "Your Answer is Incorrect";
                    }
            }
            ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6" style="margin-top: 4em;">
            <input style="margin-left: 60%" type="button" name="save-button" value="Save" id="button-save-button">
            <input style="margin-right: -20em;" type="submit" name="submit-button" value="Submit" id="submit-button">
        </div>
    </div>
</body>
</html>