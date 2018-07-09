<?php 
require 'api/dbfunctions.php';
getUserData($_SESSION['userid']);

if($_SESSION['timedOut'])
    header('Location: timeout.php');

global $lastLevel;
if($_SESSION['level']>$lastLevel)
    header("Location: limit.html");

getLevelData($_SESSION['level']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TT16 : Hopeless Opus</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/vue.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            /*background-image: url('images/def.jpg');*/
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Trebuchet MS';
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav>
                <div class="col-xs-12">
                    TechTatva 16 | Hopeless Opus | <?php echo $_SESSION['username']; ?>
                </div>
            </nav>
        </div>
    </div>
    <div id="spacer" class="hidden-sm-down"></div>
    <div class="container">
    	<div class="row" style="text-align: center;">
    		<div class="col-xs-12 col-md-3 col-lg-2" id="sidebar-container">
                <!-- <div class="sidebar-item">
                    <img src="images/map.png" class="img-fluid">Map
                </div> --><!--
                --><div class="sidebar-item">
                    <h1>{{superpowers}}</h1>Super powers
                </div><!--
                --><div class="sidebar-item">
                    <a href="instructions.html" target="_blank"><h1>Gu</h1>Guide</a>
                </div><!--
                --><div class="sidebar-item" onclick="leaderboard()" style="cursor: pointer;">
                    <h1>Le</h1>Get Leader Board
                </div><!--
                --><div class="sidebar-item" id="leaderStats" style="display: none">
                    {{ahead}} Ahead<br>{{behind}} Behind
                </div>
    		</div>
    		<div class="col-xs-12 col-md-9 col-lg-10" id="content-container">
                <div id="heading" class="content-background" style="margin-top: 0px">
                    <h3 style="margin: 0px;">Level {{level}}</h3>
                </div>
                <div id="content" class="content-background" v-html="content">
                    
                </div>
                <div id="question" v-if:="state.showQuestion">
                    <div class="content-background" v-html="question">
                        
                    </div>
                    <form v-on:submit.prevent="giveAnswer">
                        <input type="text" name="answer" id="answer"> 
                        <button type="submit" v-bind:disabled="state.formsDisabled">Submit</button>
                    </form>
                </div>
                <div id="choice" v-if:="state.showChoice">
                    <div class="content-background">
                        Where do you want to go?
                    </div>
                    <form v-on:submit.prevent>
                        <template v-for="option in storyOptions">
                            <div class="col-xs-4">
                                <button  onclick="makeChoice('{{option}}')" v-bind:disabled="state.formsDisabled">
                                    {{option}}
                                </button>
                            </div>
                        </template>                        
                    </form>
                </div>
                <div id="decide" v-if:="state.showDecide">
                    <div class="content-background">Do you want to use your superpower?</div>
                    <form v-on:submit.prevent>
                        <div class="col-xs-6">
                            <button onclick="decide('useSuper')" v-bind:disabled="state.formsDisabled">Yes</button>
                        </div>
                        <div class="col-xs-6">
                            <button onclick="decide('no')" v-bind:disabled="state.formsDisabled">No</button>
                        </div>
                    </form>
                </div>
    		</div>
    	</div>
    </div> 
    <script type="text/javascript">
        var stateStore= 
        {
            showQuestion: false,
            showChoice: false,
            showDecide: false,
            showAnswerForm: true,
            formsDisabled: false
        }
        $.ajaxSetup({
            //url: 'getLevel.php',
            type: 'POST',
            dataType: 'json',
        });
        $(document).ajaxStart(function() {
            stateStore.formsDisabled=true;
        });
        $(document).ajaxComplete(function(event, xhr, settings) {
            var response=xhr.responseJSON;
            if(response.hasOwnProperty('redirect'))
            {
                //alert("Redirect to: "+response.redirect);
                if(response.redirect==="timeout")
                {
                    doTimeout();
                    return;
                }
                else if(response.redirect==="skip")
                {
                    makeChoice('skip');
                }
                else if(response.redirect==="limit")
                {
                    window.location="limit.html";
                }
            }
            if(response.hasOwnProperty('level'))
                vm.level=getSimpleLevel(response.level);
            if(response.hasOwnProperty('superpowers'))
                vm.superpowers=response.superpowers;
            if(response.hasOwnProperty('story'))
                vm.content=response.story;
            if(response.hasOwnProperty('show'))
            {
                if(response.show==="question")
                    getAndShowQuestion();
                if(response.show==="decide")
                {
                    stateStore.showQuestion=false;
                    stateStore.showChoice=false;
                    stateStore.showDecide=true;
                }
            }
            console.log(response);
            //stateStore.formsDisabled=false;
        });
        $(document).ajaxError(function(event, xhr, settings, thrownError) {
            console.log('AJAX error!');
            console.log(xhr);
            console.log(thrownError);
            stateStore.formsDisabled=false;
        });
        
        var vm=new Vue({
            el: 'body',
            data: {
                level: '',
                content: 'Loading...',
                question: 'Loading...',
                storyOptions: [],
                state: stateStore,
                superpowers: '',
                ahead: '?',
                behind: '?'
            },
            methods: {
                giveAnswer: giveAnswer
            }
        });

        function getAndShowQuestion()
        {
            //document.getElementById('answer').value="";
            $.ajax({
                url: 'api/getQuestion.php',
                data: {}
            })
            .done(function(response) {
                vm.question=response.question;
                $('#answer').focus();
                $('body').css('background-image', 'url(images/'+response.image+')');
                stateStore.showQuestion=true;
                stateStore.showChoice=false;
                stateStore.showDecide=false;
                stateStore.formsDisabled=false;
            });
        }

        function giveAnswer()
        {
            var useranswer=document.getElementById('answer').value;
            useranswer = useranswer.replace(/[^\w]/gi, ''); //Allow only digits, alphabets, and underscore
            console.log("Answering: "+useranswer);
            $.ajax({
                url: 'api/checkAnswer.php',
                data: {answer: useranswer}
            })
            .done(function(response) {
                if(response.correct==="no")
                {
                    //document.getElementById("answer").value="That's not right...";
                    $("#answer").attr('placeholder', "That's not right...");
                }
                else if(response.correct==="yes")
                {
                    if(response.show==="choice")
                    {
                        vm.storyOptions=response.options;
                        stateStore.showQuestion=false;
                        stateStore.showChoice=true;
                        stateStore.showDecide=false;
                    }
                    //show===question is in global handler
                }
                $("#answer").val("");
                stateStore.formsDisabled=false;
            });
        }

        function makeChoice(choice)
        {
            console.log("Choice: "+choice);
            $.ajax({
                url: 'api/makeChoice.php',
                data: {choice: choice}
            })
            .done(function(response) {
                ;
                //response.show===question should execute in global handler
            });
        }

        function decide(decision)
        {
            console.log("Decision: " +decision);
            $.ajax({
                url: 'api/decide.php',
                data: {choice: decision}
            })
            .done(function(response) {
                //response.show===question in global handler
                //response.redirect===timeout in global handler
                console.log('Decided');
            });
        }

        function doTimeout()
        {
            $.ajax({
                url: 'api/setTimeout.php',
                data: {}
            })
            .done(function(response) {
                if(response.success)
                {
                    window.location='timeout.php';
                }
            });
        }

        function getSimpleLevel(level)
        {
            var complexLevel=level-1;
            complexLevel/=3;
            return Math.floor(complexLevel+1);
        }

        function leaderboard()
        {
            $.ajax({
                url: 'api/leaderboard.php',
                data: {}
            })
            .done(function(response) {
                if(response.hasOwnProperty('ahead'))
                {
                    $("#leaderStats").show();
                    vm.ahead=response.ahead;
                }
                if(response.hasOwnProperty('behind'))
                    vm.behind=response.behind;
                stateStore.formsDisabled=false;
            });
        }

        getAndShowQuestion();
    </script> 
</body>
</html>