<!DOCTYPE html>
<html>
<script type="text/javascript" src="jquery-3.1.0.js"></script>
<style>
#container {
	position:relative;
left:0px;
  width: 666.666px;
  height: 500px;
  
}

div.divanimate {
position:relative;
width: 16.667%;
height: 16.667%;
float:left;

background-size: 100% 100%;
}
img.divblack { position:absolute; width:100%; height:100%; z-index:10; background-size:100% 100%; }
img.a { position:absolute; width:100%; height:100%;  }
button {position:relative;}
</style>

<script>
function backg(a){
	var imgs = document.getElementById("black_"+a);
	imgs.src = "image.jpg";
}
function myMove() {
 
 var inp = document.getElementById("lol")
 var x = inp.value;
 var img = document.getElementById("image_"+x);	
  var elem = document.getElementById("animate_"+x);   
  var lol = document.getElementById("black_"+x);
  var op=1;
  var pos = 0;
  var id = setInterval(frame, 0.1);
  function frame() {
    if (pos == 362) {
      clearInterval(id);
    } else {
		img.src = x+".jpeg";
     elem.style.transform = "rotate("+pos+"deg)"; 
     lol.style.opacity=op;
     op=op-.0065;
    pos=pos+2;
}
  }
}
</script>


 

<div id ="container">
<?php
 
for($i=1;$i<37;$i++)
print <<< here
<div id ="animate_$i" class="divanimate">
<img id="image_$i" class="a" src="#"/>
<img id="black_$i"  src="image$i.jpeg" class="divblack"/>
</div>
here;
?>
</div>
<input id="lol" placeholder="answer" />
<button onclick="myMove()">enter</button>

</body>
</html>