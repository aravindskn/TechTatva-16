<?php
require 'api/dbfunctions.php';
/*session_start();
if(!isset($_SESSION['userid']))
{
  $_SESSION['userid']=1;
  //die();
}*/
getUserData($_SESSION['userid']);
//$_SESSION['allowRetry']=false;
global $lastLevel;
if($_SESSION['level']>$lastLevel)
{
  header("Location: limit.html");
  die();
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery3.js"></script>
</head>
<body>
  <!-- <p id="play"></p> -->
    <canvas id="myCanvas" ></canvas>
    <canvas id="mini"></canvas> 
    <div id="instructions" style="position: absolute; height: 100vh; width: 100vw; z-index: 3; background: white;">
      <img src="images/instructions2.jpg" style="max-width: 100%; max-height: 100%; margin: auto; display: block;">
    </div>
    <img src="./images/CarFinal.png" style="display: none;" id="car">
    <img src="./images/CityNew.jpg" style="display: none;" id="city">
    <img src="./images/BeachFinal.png" style="display: none;" id="beach">
    <img src="./images/grass.jpg" style="display: none;" id="grass">
    <img src="./images/Fissure.png" style="display: none;" id="fissure">
    <img src="./images/ScreenAlter.png" style="display: none; " id="popquiz">
    <img src="./images/Flagger.png" style="display: none; " id="flagger">
    <img src="./images/pothole.png" style="display: none;" id="pothole">
    <img src="./images/NitroCrate.png" style="display: none;" id="nitroCrate">
    <img src="./images/Speed.png" style="display: none;" id="statix">
    <img src="./images/Pool.jpg" style="display: none;" id="watertex">
    <img src="./images/miniCity.png" style="display: none;" id="miniCity">
    <img src="./images/miniBeach.png" style="display: none;" id="miniBeach"> 
    <img src="./images/pointer.png" style="display: none;" id="pointer">
    <img src="./images/sand.jpg" style="display: none;" id="sand">
    <img src="./images/CityNewInv.jpg" style="display: none;" id="cityInv">
    <img src="./images/grassInv.jpg" style="display: none;" id="grassInv">
    <img src="./images/miniGrass.png" style="display: none;" id="miniGrass">
    <img src="./images/wallpattern.png" style="display: none;" id="wallpattern">
    <img src="./images/miniSand.png" style="display: none;" id="miniSand">
    <img src="./images/miniGrassInv.png" style="display: none;" id="miniGrassInv">
    <img src="./images/miniCityInv.png" style="display: none;" id="miniCityInv">
    <img src="./images/pause.png" id="pauseImg" >
    <img src="./images/instructions.jpg" id="instructions" style="display: none;">
    <img src="" style="display: none;" id="q">
    
    <h2 id="race" onclick = "startRace();"> RACE</h2>
  
    <div id="questionPopup">
      <div id="questionText">Getting Question...</div>
      <img id="questionImage" src="">
      <div>
        <form onsubmit="return false;">
          <input type="text" name="answer" placeholder="Answer: " id="answer">
          <button type="submit" onclick="submitAnswer()">Submit</button>
      </form>
      </div>
      <button onclick="retry();" id="retryButton">Retry</button>
    </div>

    <div id="scoreBox">
      Score: <span id="scoreValue"><?php echo $_SESSION['score'] ?></span><br>
      Retry Left: <span id="resetValue"><?php echo $_SESSION['resets'] ?></span><br>
      Next Level: <span id="levelValue"><?php echo $_SESSION['level'] ?></span><br>
    </div>

    <script type="text/javascript" src="drawing.js"></script>
    <script type="text/javascript" src="question.js"></script>
    
    <script>
      window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
      })();


      var timeCount = 0;
      var pausebut = document.getElementById('pauseImg');
      pausebut.addEventListener('click', function(){
        if (!pause) {
          activePause();
        }
        else
          activeResume();
      });
      function activePause(){

        pause = true;
        console.log('inside');
        resume = false;
        pausebut.setAttribute('src', './images/resume.png');
        speed = 0;
        context.globalAlpha = 0.5;
        context.fillStyle = 'white';
        context.fillRect(0,0, canvas.width, canvas.height);

      }
      function activeResume(){
        pause = false;
        pausebut.setAttribute('src', './images/pause.png');
        animate();
      }
      var tp = setInterval(function(){
        if (!pause) {
          timeCount+= 1;
          //console.log('yes');
        }
        if (timeCount ==60) {
          timeCount = 0;
          minutes += 1;

         }
         if (minutes == 60) {
          minutes = 0;
          hours += 1;
         }
      }, 1000);
      

/*----------------------------------------------------------Animate---------------------------------------------------------*/
      function animate() {
          heights();                                                       //arrange the heights of images
          if(pause) {
            last = (new Date()).getTime();
            newY = newY;
          }
        
         if(!pause) {                                                    //timing
         //timeDiff = (new Date()).getTime() - startTime;
         //timeDiff /= 1000;

         seconds = Math.floor(timeCount % 60);

         //timeDiff = Math.floor(timeDiff / 60);
         //minutes = Math.floor(timeDiff % 60);
         //timeDiff = Math.floor(timeDiff / 60);
         //hours = Math.floor(timeDiff % 24);
         //timeDiff = Math.floor(timeDiff / 24);
         
       
        


       /*--------------------------------------------Car vibrations---------------------------------------------------*/
        if (number % 2 == 0 && speed!=0 ) {
          car.x = car.x - 1/10;
          
        }
        if (number % 2 != 0 && speed!=0) {
          car.x = car.x + 1/10;
          
        }
        
    /*-----------------------------------------------Key Controls----------------------------------------------------------*/

        if (!upspeed && !downspeed && speed!=900) {
          if (speed >0) {
          speed = speed + decel*dt;
        }
        if (speed <0) {
          speed = 0;
        }
        }  
        dx = dt*speed/maxSpeed*300;
        if (!pause) {
        now =  (new Date()).getTime();
        dt  = Math.min(1, (now - last) / 1000);
        last = now;
        
        
        newY = newY + speed*dt;
      }
        
        if(upspeed && !downspeed) {
         
          if (speed < maxSpeed) {
            speed = speed + acceleration*at/100;
          }
          if (speed > maxSpeed) {
           if (nitrus.active || nitroTime > 0) {

            } else {
            speed = maxSpeed;
          }
          }
         
        }

        if(downspeed & !upspeed) {
            if (speed >= 0 ) {
              speed = speed + breaking*at/100;
            }
            if (speed <0) {
              speed = 0;
            }
            //pause = true;
        
        }

        if (right) {
          
          if (speed > 0 && !pause) {
            
            if (car.x <= window.innerWidth/1.7 && car.x >= window.innerWidth/2.85 )
            {
              
              car.x = car.x + dx;

            }
            else
            {
              
            }
        }
        }
        if (left) {
          if (speed > 0 && !pause) {
          if (car.x <= window.innerWidth/1.7 && car.x >= window.innerWidth/2.85 ) {
          car.x = car.x - dx;

        }
        }
      }



      if (nitro) {
        if (nt >= 10 && nitrus.have == 1) {
          nitrus.active = true;
        }
        else{}
      }

      if (nitrus.active && !pause) {
        if (speed < 900) {
          speed = speed + 80;
        }
        if (speed > 900) {
          speed = 900;
        }
        if (speed == 900) {
          nitroTime = nitroTime + dt;
        }
      }
      if (nitroTime >= 5 ) {
        if (speed > maxSpeed) {
          speed = speed - 60;
          nitrus.active = false;
          nt = 0;
          nitrus.have = 0;
        }
        if (speed <= maxSpeed) {
          nitroTime = 0;
        } 
      }

        //keep car within limits
      if (car.x < window.innerWidth / 2.85) {
          car.x = window.innerWidth/2.85;
        }
        if (car.x > window.innerWidth / 1.7) {
          car.x = window.innerWidth / 1.7;
        }
     if (index < 1000) {

 /*-----------------------------------------------Obstacle Spawn----------------------------------------------------------*/  


      if(index % 5 == 0) {
        if(obstacle.fissureY >= window.innerHeight) {
          if(!executed) {
            rand = Math.floor(Math.random()*2 );
       
            obCount = parseInt(newY / window.innerHeight);
            obCount = obCount + 1;
            executed = true;        
            div = (Math.random()*5 + obCount);
            obstacle.fissureX = (Math.random() * (window.innerWidth* 53/150 - window.innerWidth*41/75) + window.innerWidth*41/75);
          }
        }
      }
      else{
        executed =  false;
      }
      //nitrus spawn
      if (index % 20 == 0) {
        if (nitrus.y > window.innerHeight) {
          nitrus.n += 2;
          nitrus.x = (Math.random() * (window.innerWidth* 53/150 - window.innerWidth*41/75) + window.innerWidth*41/75);
          nitrus.disp  = true;          
        }
      }
        //displacements
        one.y = newY - index*window.innerHeight*2/5;
        two.y = one.y + window.innerHeight*2/5;
        three.y = one.y +window.innerHeight*4/5;
        road.backY = newY - window.innerHeight*2*(indexTwo);
        
        obstacle.fissureY = newY - window.innerHeight * div ;
        checkpoint.y = newY - window.innerHeight*order;    
        nitrus.y = newY - window.innerHeight*5*nitrus.n;
        
        //repeat loop
        if (three.y >= window.innerHeight) {
          index ++;
        }
        if (road.backY >= 0) {
          indexTwo = indexTwo + 1;
        }
        
      
        

      /*-----------------------------------------------------Obstacle Check-------------------------------------------------*/
      if (car.y < obstacle.fissureY + obstacleA[rand].h - 10 && obstacle.fissureY + 20 < car.y + car.h) {
        if (!check) {
          if (car.x + car.w > obstacle.fissureX + 10 && obstacle.fissureX + obstacleA[rand].w - 10 > car.x) {
            if (speed > 0 ) {
                speed = speed - 60;
                nitrus.active = false;
                nitroTime = 5;
              }
              if (speed < 0) {
                speed = 0;
              }
              if (speed == 0) {
                check = true;
                upspeed = false;
                
                
                
                nt = 0;
              }
           }
       }
     }
     else{
      check = false;
     }
     //nitruscheck
     if (car.y < nitrus.y + nitrus.h && nitrus.y < car.y + car.h) {
      if (car.x + car.w > nitrus.x && nitrus.x + nitrus.w > car.x) {
        if (nitrus.have == 0) {
          nitrus.have = 1;
          
        }
        nitrus.disp = false;
      }
     }

    /*----------------------------------------------------------------------------------------------------------------------*/
        
        //clear rect 
        context.fillRect(0, 0, canvas.width, canvas.height);
        


        path();
        
        drawRectangle(one, two, three, context);
        sidelanes();
      //handling change in background
       if (index == 100 || index == 200 || index == 300 || index == 400 || index == 500) {

          nextBack = true;
          presI = indexTwo;
      }

     
      if (nextBack) {
        leftBackground(backLeft[backCount], road.backY );
        leftBackground(backLeft[backCount + 1], (newY - (presI + 2)*2*window.innerHeight));
        
        rightBackground(backRight[backCount], road.backY);
        rightBackground(backRight[backCount + 1], (newY - (presI + 2)*2*window.innerHeight));
       
        if (backRight[backCount] != backRight[backCount + 1]) {
         context.beginPath();
         context.fillStyle = 'black';
         context.fillRect(window.innerWidth*2/3 - 5, (newY - (presI*2 + 1)*window.innerHeight) - 5, window.innerWidth/3 + 10, window.innerHeight/25 + 10);
        
         context.drawImage(wallpatImg, window.innerWidth*2/3, (newY - (presI*2 + 1)*window.innerHeight), window.innerWidth/3, window.innerHeight/25);

        }

                

      }
      if (presI + 2 == indexTwo && nextBack) {
        nextBack = false;
        backCount += 1;
      }
      if (!nextBack) {

        leftBackground(backLeft[backCount], road.backY );
        rightBackground(backRight[backCount], road.backY);
        
        }
        obSpawn(obstacleA[rand].img,obstacle.fissureX, obstacle.fissureY, obstacleA[rand].w, obstacleA[rand].h);


        if (nitrus.disp) {
        obSpawn(nitrus.img, nitrus.x, nitrus.y, nitrus.w, nitrus.h);
      }


        
        //display time
        obSpawn(speedmeter.img, speedmeter.x, speedmeter.y, speedmeter.w, speedmeter.h);
        speedometer(parseInt( speed/10),window.innerWidth/10, window.innerHeight*7.43/8, 35);

        if (seconds < 10) {
        speedometer('0' + seconds, window.innerWidth*1.26/10, window.innerHeight*6.95/8, 20);
        }
        speedometer(':', window.innerWidth*1.22/10, window.innerHeight*6.95/8, 20);
         if (seconds >= 10) {
        speedometer(seconds, window.innerWidth*1.26/10, window.innerHeight*6.95/8, 20);
        }
        if (minutes < 10) {
        speedometer('0' + minutes, window.innerWidth*1.08/10, window.innerHeight*6.95/8, 20);
        }
        if (minutes >= 10) {
        speedometer(minutes, window.innerWidth*1.08/10, window.innerHeight*6.95/8, 20);
        }
        speedometer(':', window.innerWidth*1.05/10, window.innerHeight*6.95/8, 20);

         if (hours < 10) {
        speedometer('0' + hours, window.innerWidth*0.9/10, window.innerHeight*6.95/8, 20);
        }
        if (minutes >= 10) {
        speedometer(hours, window.innerWidth*.9/10, window.innerHeight*6.95/8, 20);
        }
        /*
        if (seconds >= 10 && minutes < 10) {
        speedometer('0' + minutes + ':' + seconds, window.innerWidth/10, window.innerHeight*6.98/8, 20);
        
        }
        if (seconds >= 10 && minutes >= 10) {
        speedometer(minutes + ':' + seconds, window.innerWidth/10, window.innerHeight*6.98/8, 20);
                }
        if (seconds < 10 && minutes >= 10) {
        speedometer(minutes + ':' + '0' + seconds, window.innerWidth/10, window.innerHeight*6.98/8, 20);

        }*/
        if (nitrus.have) {
          if (nitroTime == 0) {
            divide = 0.09523;
          }
          else {
            divide = (0.09523 - nitroTime*0.0190);
          }
        }
        else{
          divide = 0;
        }
       
        nitroBar(divide);
        miniImg();
        
        drawCheckpoint();
        drawCar();


        //quizPop();
   /*------------------------------------------------Checkpoints----------------------------------------------------------*/

      if (car.y <= checkpoint.y + window.innerHeight/25 && !answer ) {
        quizPop();
        pause = true;
        speed = 0;
        //questionDisp();
      }
      if (answer) {
        pause = false;
        /*quizTxt.style.display = 'none';
        document.getElementById('answer').style.display = 'none';
        document.getElementById('retry').style.display = 'none';*/

      }
      if (checkpoint.y > window.innerHeight) {
        order = order + 20;
        answer = false;
        ques = ques + 1;
      }
      
      
     
      }

      //car navigation pulsating
      if (!done) {
      if (rPointer < window.innerWidth / 70) {
        rPointer += dt*30;
        
      }

      if (rPointer >= window.innerWidth / 70 ) {
        rPointer = window.innerWidth / 70;
        done = true;
      }
      }

      else{
        if (rPointer > window.innerWidth/ 200) {
        rPointer -= dt*30;

          }
        if (rPointer <=window.innerWidth/ 200) {
        rPointer = window.innerWidth/ 200;
        done = false;
        }
      }
      if (!pause) {
        requestAnimFrame(function() {
          animate();
        });
      }
    }
    }

/*----------------------------------------------------Variables-----------------------------------------------------------------*/  
      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      context.canvas.width  = window.innerWidth;
      context.canvas.height = window.innerHeight;

      var midRadius;
      var one = {
        x: window.innerWidth/2,
        y: 0,        
        width: window.innerWidth/100,
        height: window.innerHeight/5        
      };
      var two = {
        x: window.innerWidth/2,
        y: one.y + window.innerHeight*2/5,       
        width: window.innerWidth/100,
        height: window.innerHeight/5
      };
      var three = {
        x: window.innerWidth/2,
        y: one.y + window.innerHeight*4/5,
        width: window.innerWidth/100,
        height: window.innerHeight/5
      };
      var road = {
        y: 0,
        backY: -window.innerHeight*2,
      };
      var car = {
        x: window.innerWidth / 2.85,
        y: window.innerHeight / 1.4,
        w: window.innerWidth / 15,
        h: window.innerHeight / 4
      };
      var obstacle = {
        fissureX: window.innerWidth*53/150,
        fissureY: 0,
        fissureW: window.innerWidth/10,
        fissureH: window.innerHeight/5  

      };
      var background = {
        oneLeft: grassImg,
       
      };
      var checkpoint = {
        y: 0
      };  
      var divide = 0 ;

      //-----------------------------------------------From Server Side----------------------------------------------------
      var question = [
         "Which Green car is driven by Brian Griffin in the animated sitcom <q>Family Guy </q> ?",
         "question 2",
         "question 3"
     ];

      var url = '';  
      var backCount = 0;

      var timeDiff = 0;
      var seconds = 0;
      var minutes = 0;  
      var hours = 0;   
      var presI = 0;
      var nextBack = false;
      
      var nitroTime = 0;
      var speed = 0;
      var maxSpeed = 450;
      var prevSpeed = speed;
      var acceleration = 50;
      var decel = -50;
      var breaking = -75;
      var at = 0;
      var dt = 0;
      var nt = 0;
      var dx = 0;
      var rand = 0;
      var index = 0;
      var indexTwo = 1;
      var indexThree = 1;
      var number = 0;
      var startTime;
      var upspeed;
      var downspeed;
      var left;
      var right;
      var nitro;
      var now;
      var last;
      var newY = 0;
      var speedtwo = 0;
      var pause = true;
      var nextY = 0;
      var check = false ;
      var img = document.getElementById("car");
      var stopTime = 0;
      var obCount = 1;
      var div = 2;      
      var executed = true;
      var answer = false;
      var order = 1;
      var ques = 0;
      
      var beachImg = document.getElementById('beach');
      var cityImg = document.getElementById('city');
      var sandImg = document.getElementById('sand');
      var fisImg = document.getElementById('fissure');
      var quizImg = document.getElementById('popquiz');
      var flagImg = document.getElementById('flagger');
      var quizTxt = document.getElementById('disp');
      var potImg = document.getElementById('pothole');
      var nitroImg = document.getElementById('nitroCrate');
      var speedImg = document.getElementById('statix');
      var waterImg = document.getElementById('watertex');
      var miniCityImg = document.getElementById('miniCity');
      var pointerImg = document.getElementById('pointer');
      var miniBeachImg = document.getElementById('miniBeach');
      var grassImg = document.getElementById('grass');
      var quesImg = document.getElementById('q');
      var cityInvImg = document.getElementById('cityInv');  
      var grassInvImg = document.getElementById('grassInv'); 
      var miniGrassImg = document.getElementById('miniGrass');
      var wallpatImg = document.getElementById('wallpattern');
      var miniSandImg = document.getElementById('miniSand');
      var miniGrassInvImg = document.getElementById('miniGrassInv');
      var miniCityInvImg = document.getElementById('miniCityInv');
      var instructionsImg = document.getElementById('instructions');
      console.log('done');
      
      var obstacleA = [];
      var backLeft = [grassImg, grassImg, cityInvImg, sandImg, beachImg, beachImg];
      var backRight = [grassInvImg, cityImg, cityImg, cityImg, cityImg, sandImg];
      var miniLeft = [miniGrassImg, miniGrassImg, miniCityInvImg, miniSandImg, miniBeachImg, miniBeachImg];
      var miniRight = [miniGrassInvImg, miniCityImg, miniCityImg, miniCityImg, miniCityImg, miniSandImg];
      var rPointer = 0;
      var done = false;
      var resume = false;
      var pot = {
        img: potImg,
        x: window.innerWidth*53/150,
        y: 0,
        w: window.innerWidth/20,
        h: window.innerHeight/5  

      };
      var fiss = {
        img: fisImg,
        x: window.innerWidth*53/150,
        y: 0,
        w: window.innerWidth/10,
        h: window.innerHeight/5  

      };
      var nitrus = {
        img: nitroImg,
        x: window.innerWidth*53/150,
        y: 0,
        w: window.innerWidth/30,
        h: window.innerHeight/5,
        n: 1, 
        have: 0,
        disp: true,
        active: false
        
      };

     

      var speedmeter = {
        img: speedImg,
        x: -window.innerWidth/100,
        y: window.innerHeight*3.8/5,
        w: window.innerWidth/4,
        h: 0
      };

      var widthIns = 0;
      function heights(){
        pot.h = pot.w*potImg.height/potImg.width;
        fiss.h = fiss.w*fisImg.height/fisImg.width;
        obstacle.fissureH = obstacle.fissureW*fisImg.height/fisImg.width;
        nitrus.h = nitrus.w*nitroImg.height/nitroImg.width;
        speedmeter.h = speedmeter.w*speedImg.height/speedImg.width;
        miniObj.w = miniObj.h*miniCityImg.width/miniCityImg.height;
        widthIns = 700*instructionsImg.width/instructions.height;

        obstacleA.push(pot);
        obstacleA.push(fiss);
        

      }
     
      


/*----------------------------------------------------Controls---------------------------------------------------------------*/
    window.addEventListener('keydown', function(event) {
      if (event.keyCode == 37 || event.keyCode == 65) {
        left = true;
      }
      if (event.keyCode == 38 || event.keyCode == 87) {

        upspeed = true;

        at = at + 10;
        
      }

      if (event.keyCode == 39 || event.keyCode == 68) {
        right = true;
      }
      if (event.keyCode == 40 || event.keyCode == 83) {
        downspeed = true;
        at = at + 10;
      }
      if (event.keyCode == 32) {
        nitro = true;
        nt = nt + 10;  

        if (nitrus.have == 0) {
          nt = 0;
        }      
        
      }      
      
    });
    window.addEventListener('keyup', function(event) {
      if (event.keyCode == 37 || event.keyCode == 65) {
        left = false;
      }
      if (event.keyCode == 38 || event.keyCode == 87) {
        upspeed = false;

      }
      if (event.keyCode == 39 || event.keyCode == 68) {
        right = false;
      }
      if (event.keyCode == 40 || event.keyCode == 83) {
        downspeed = false;
      }
      if (event.keyCode == 32) {
        nitro = false;
      }
      at = 0;
      
     
      
    });

/*-----------------------------------------------------Minimap---------------------------------------------------------------*/    
   

    var centerX = window.innerWidth*4.5/5;
    var centerY = window.innerHeight*4/5;
    var radiusMini = window.innerWidth / 10;

     var miniObj = {
        img: miniRight[3],
        imgTwo: miniLeft[3],
        x: centerX + window.innerWidth/80,
        y: 0,
        w: window.innerWidth / 2,
        h: window.innerHeight*4/5
      };
    function miniImg() {
      context.save();
      context.beginPath();
      context.arc(centerX, centerY, radiusMini, 0, 2 * Math.PI, false);

      context.clip();
      context.beginPath();

      
      
      context.beginPath();
      //midpath

      context.rect(centerX - window.innerWidth/160, 0, window.innerWidth/80, window.innerHeight);
      //right side
      if (nextBack) {
        rightMini(miniRight[backCount], road.backY/5);
        rightMini(miniRight[backCount + 1], (newY - window.innerHeight*2*(presI + 6))/5);
        leftMini(miniLeft[backCount], road.backY/5);
        leftMini(miniLeft[backCount + 1], (newY - window.innerHeight*2*(presI + 6))/5);
        
      }
      
      if (!nextBack) {
        leftMini(miniLeft[backCount], road.backY/5);
        rightMini(miniRight[backCount], road.backY/5);
      }
      //left side

      context.fillStyle = '#22313F';
      context.fill();
      miniCheckpoints(checkpoint.y);

      context.restore();

      context.beginPath();
      context.arc(centerX, centerY, radiusMini + window.innerWidth/300, 0, 2 * Math.PI, false);

      
      var my_gradient = context.createLinearGradient(0,centerY - radiusMini,0, centerY + radiusMini);
      my_gradient.addColorStop(0,"#191919");
      my_gradient.addColorStop(0.5,'#666666');
      my_gradient.addColorStop(1,"#191919");
      context.strokeStyle=my_gradient;
      context.lineWidth = window.innerWidth/150;
      context.stroke();


      context.beginPath();
      context.arc(centerX, centerY, radiusMini + window.innerWidth/200, 0, 2 * Math.PI, false);
      var grad = context.createLinearGradient(0, centerY - radiusMini, 0, centerY + radiusMini);
      grad.addColorStop(0, '#c0c0c0');
      grad.addColorStop(.5, '#909090');
      grad.addColorStop(1, '#c0c0c0');
      context.strokeStyle = grad;
      context.lineWidth = window.innerWidth/400;
      context.stroke();

      
      context.beginPath();
      context.globalAlpha = 0.6;
      context.arc(centerX, window.innerHeight*9.2/10, rPointer, 0, 2 * Math.PI, false);
      context.fillStyle = "#1E8BC3";
      context.fill();
      context.globalAlpha = 1.0;
      
      
      context.drawImage(pointerImg, window.innerWidth*8.9/10, window.innerHeight*9/10 , window.innerWidth/50, window.innerHeight/25);

  
 }


      window.onload = function(){
        context.globalAlpha = 0.5;
        heights();
      path();
      sidelanes();
      drawRectangle(one, two, three, context);
      drawCar();
      leftBackground(backLeft[backCount], road.backY );
      rightBackground(backRight[backCount], road.backY);
      begin();
    };
     

     function startRace(){
        last =  (new Date()).getTime();
        startTime = (new Date()).getTime();
        pause = false;
        animate();
        document.getElementById('race').style.display = 'none';
        document.getElementById('instructions').style.display='none';
      }
 /*
      setTimeout(function() {
        last =  (new Date()).getTime();
        startTime = (new Date()).getTime();
        pause = false;
        animate();
       

      }, 100);*/
    </script>
</body>
</html>      