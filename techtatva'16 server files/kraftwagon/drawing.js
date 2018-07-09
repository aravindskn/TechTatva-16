function begin()
{
  context.globalAlpha = 1;
  context.drawImage(instructionsImg, window.innerWidth*.95/3, 0,widthIns, 700 );
}

function path()
{
  context.beginPath();
  context.rect(window.innerWidth/3, road.y, window.innerWidth/3,window.innerHeight);
  context.fillStyle = '#22313F';
  context.fill();
}

function sidelanes()
{
  context.beginPath();
  context.rect(window.innerWidth/3+window.innerWidth/100, road.y, window.innerWidth/100, window.innerHeight);
  context.rect(window.innerWidth*194/300, road.y, window.innerWidth/100, window.innerHeight);
  context.fillStyle = "#F5AB35";
  context.fill();
}

function drawRectangle(one, two, three, context) 
{              
  context.beginPath();
  context.rect(one.x, one.y, one.width, one.height);
  context.rect(two.x, two.y, two.width, two.height);
  context.rect(three.x, three.y, three.width, three.height);
  context.fillStyle = '#E4F1FE';
  context.fill();
}

function drawCar() 
{
  context.drawImage(img, car.x, car.y, car.w, car.h);
}
var count = 0;
var countTwo = 0;
setInterval(function(){
  if (!pause) 
  {
    count +=1;
    if (index >= 200) {
      countTwo +=1;
    }
  }
}, 1);

setInterval(function(){  
  if (!pause){
    number = number + 1;
  }
}, 100);

function leftBackground(img, y) {
  context.drawImage(img, 0, y, window.innerWidth/3, window.innerHeight*3);
  //context.drawImage(beachImg, 0, road.backY - window.innerHeight*2, window.innerWidth/3, window.innerHeight*2);
}
function rightBackground(img, y) {
  context.drawImage(img, window.innerWidth*2/3, y, window.innerWidth/3, window.innerHeight*3);
}
function rightMini(img, y) {
  context.drawImage(img, centerX + window.innerWidth/160, y + window.innerHeight*11/5, miniObj.w, miniObj.h);
  context.drawImage(img, centerX + window.innerWidth/160, y + window.innerHeight*7/5, miniObj.w, miniObj.h);
  context.drawImage(img, centerX + window.innerWidth/160, y + window.innerHeight*3/5, miniObj.w, miniObj.h);
}
function leftMini(img, y) {
  context.drawImage(img, centerX - window.innerWidth/10 - window.innerWidth/33, y + window.innerHeight*11/5, miniObj.w, miniObj.h);
  context.drawImage(img, centerX - window.innerWidth/10 - window.innerWidth/33, y + window.innerHeight*7/5, miniObj.w, miniObj.h);
  context.drawImage(img, centerX - window.innerWidth/10 - window.innerWidth/33, y + window.innerHeight*3/5, miniObj.w, miniObj.h);

}

function obSpawn(image,x, y, w,h) {
  context.drawImage(image, x, y, w, h);
}
function speedometer(speed, x, y, size) {
  context.font=  String(size) + 'px digital';
  context.fillStyle = '#FDE3A7';
  context.fillText( speed, x, y);
}

function miniCheckpoints(y) {
  context.beginPath();   
  context.rect(centerX - window.innerWidth/160, y/5 +  window.innerHeight*3.8/5  , window.innerWidth/80, window.innerHeight/100);
  //console.log(y);
  context.fillStyle = '#C0392B';
  context.fill();
}

function drawCheckpoint(){
  context.globalAlpha = 0.95555;
  context.beginPath();
  context.rect(window.innerWidth/3, checkpoint.y , window.innerWidth/3, window.innerHeight/25);
  context.fillStyle = "#DCC6E0";
  context.fill();    
  context.globalAlpha = 1.0;
  context.closePath();

  context.beginPath();
  context.rect(window.innerWidth/3 + window.innerWidth* 0.9 /27, checkpoint.y , window.innerWidth/27, window.innerHeight/25);
  context.fillStyle = "#C0392B";
  context.fill();    
  context.closePath();

  context.beginPath();
  context.rect(window.innerWidth/3 + window.innerWidth*3 /27, checkpoint.y , window.innerWidth/27, window.innerHeight/25);
  context.fillStyle = "#C0392B";
  context.fill();    
  context.globalAlpha = 1.0;
  context.closePath();

  context.beginPath();
  context.rect(window.innerWidth/3 + window.innerWidth*5.2 /27, checkpoint.y , window.innerWidth/27, window.innerHeight/25);
  context.fillStyle = "#C0392B";
  context.fill();    
  context.globalAlpha = 1.0;
  context.closePath();

  context.beginPath();
  context.rect(window.innerWidth/3 + window.innerWidth*7.2 /27, checkpoint.y , window.innerWidth/27, window.innerHeight/25);
  context.fillStyle = "#C0392B";
  context.fill();    
  context.globalAlpha = 1.0;
  context.closePath();
}

function nitroBar(divide){
  context.beginPath();
  context.rect(window.innerWidth*1.4/20, window.innerHeight*3.09/4, (window.innerWidth*divide), window.innerHeight/50);
  context.fillStyle = "#CF000F";
  context.fill();    
  context.closePath();
}
