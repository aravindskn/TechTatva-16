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
    <title>Hopeless Opus</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/vue.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            background-image: url('images/forest.jpg');
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
                    TechTatva 16
                </div>
            </nav>
        </div>
    </div>
    <div id="spacer" class="hidden-sm-down"></div>
    <div class="container">
    	<div class="row" style="text-align: center;">
    		<div class="col-xs-12 col-md-3 col-lg-2" id="sidebar-container">
                <div class="sidebar-item">
                    <img src="images/map.png" class="img-fluid">Map
                </div><!--
                --><div class="sidebar-item">
                    <!-- <img src="images/map.png" class="img-fluid"> -->
                    <h1>{{superpowers}}</h1>Super powers
                </div><!--
                --><div class="sidebar-item">
                    <img src="images/map.png" class="img-fluid">Map
                </div><!--
                --><div class="sidebar-item">
                    <img src="images/map.png" class="img-fluid">Map
                </div>
    		</div>
    		<div class="col-xs-12 col-md-9 col-lg-10" id="content-container">
                <div id="heading" class="content-background" class="col-xs-12">
                    <h3 style="margin: 0px;">Level {{level}}</h3>
                </div>
                <div id="content" class="content-background col-xs-12">
                    {{content}}
                </div>
                <div id="forms-container" class="col-xs-12">
                    <form v-on:submit.prevent="submitAnswer" v-if="state.showAnswerForm">
                        <input type="text" name="answer" id="answer"> 
                        <button type="submit" v-bind:disabled="state.formsDisabled">Submit</button>
                    </form>
                    <form v-on:submit.prevent v-if="!state.showAnswerForm">
                        <template v-for="option in storyOptions">
                            <div class="col-xs-4">
                                <button  onclick="vm.submitChoice('{{option}}')" v-bind:disabled="state.formsDisabled">
                                    {{option}}
                                </button>
                            </div>
                            
                        </template>                        
                    </form>
                </div>
    		</div>
    	</div>
    </div> 
    <script type="text/javascript">
        var stateStore= 
        {
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
                alert("Redirect to: "+response.redirect);
                return;
            }
            if(response.hasOwnProperty('level'))
                vm.level=getSimpleLevel(response.level);
            if(response.hasOwnProperty('superpowers'))
                vm.superpowers=response.superpowers;
            if(response.hasOwnProperty('content'))
                vm.content=response.content;
            if(response.hasOwnProperty('newLevel'))
                stateStore.showAnswerForm=true;
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
                level: 0,
                content: 'Loading...',
                storyOptions: [],
                state: stateStore,
                superpowers: <?php echo $_SESSION['superpowers']; ?>
            },
            methods: {
                submitAnswer: function() 
                {
                    var answer=document.getElementById('answer').value;
                    console.log('submitting: ' + answer);
                    $.ajax({
                        data: {submit: 'answer', text: answer}
                    })
                    .done(function(response) {
                        if(response.correct==='yes')
                        {
                            stateStore.showAnswerForm=false;
                            vm.storyOptions=response.options;
                            //console.log(response);
                        }
                        else
                            document.getElementById("answer").value="That's not right...";
                        stateStore.formsDisabled=false;
                    });
                },
                submitChoice: function(choice) 
                {
                    console.log('choosing: ' + choice);
                    $.ajax({
                        data: {submit: 'story', text: choice}
                    })
                    .done(function(response) {
                        //console.log(response);
                        getQuestion();
                    });
                }
            }
        });

        function getQuestion()
        {
            $.ajax({
                data: {fetch: 'question'}
            })
            .done(function(response) {
                //vm.content=response;
                $('#answer').focus();
                stateStore.showAnswerForm=true;
                stateStore.formsDisabled=false;
            });
        }

        function getSimpleLevel(level)
        {
            var complexLevel=level-1;
            complexLevel/=3;
            return Math.floor(complexLevel+1);
        }

        getQuestion();
    </script> 
</body>
</html>