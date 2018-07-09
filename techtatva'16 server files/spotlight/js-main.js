
$(document).ready(function()
{
 $("#overlap").hide();
$("#contact_us").hide();
$("#about_us").hide();
$("#register").hide();
$("#rules").hide();


    
	setTimeout(function(){$("#alacrity").fadeIn(100);},100);
	setTimeout(function(){$("#alacrity").fadeOut(100);},200);
	setTimeout(function(){$("#alacrity").fadeIn(100);},200);
	setTimeout(function(){$("#alacrity").fadeOut(100);},300);
	setTimeout(function(){$("#alacrity").fadeIn(100);},300);
	setTimeout(function(){$("#presents").fadeIn(800);},300);
	
		setTimeout(function(){
			$("#alacrity").fadeOut(400);
			$("#overlap_intial").fadeOut(400);
			$("#presents").fadeOut(400);
			$("#intial_div").fadeIn(500);
		},1000);
		
	
		
	
setTimeout(function(){$("#real_pass").val('');},100);
 });



 function show_contact(){
 $("#overlap").show();
  $("#contact_us").show();
 }
 
 function show_register(){
 $("#overlap").show();
  $("#register").show();
 setTimeout(function(){ $("#real_pass1").val('');},100);

 }
 
 function show_rules(){
 $("#overlap").show();
  $("#rules").show();
 }
 
 function show_about(){
 $("#overlap").show();
 $("#about_us").show();}
 
 function hide_overlap_div(){
	  $("#overlap").hide();
	  $("#contact_us").hide();
$("#about_us").hide();
$("#register").hide();
$("#rules").hide(); 
 }
 




function onloadanim(){
var a=["10","21","34","20","18","27","22","12","15","28","13","26","9","35","32","17","23","7","29","16","3","2","4","30","5","19","25","1","11","33","6","8","24","31","14","36"]; 
var i=0;

setTimeout(function(){
var fra=setInterval(frame,100);

function frame(){anime(a[i]);i++; if(i==37)clearInterval(fra);}

setTimeout(function(){
$("#techtatva").fadeIn(2000);
$("#nav_bar").fadeIn(2000);},3800);},1300);


}
     
function anime(x){
	var elem = document.getElementById("animate_"+x);
	var op=1;
  var id = setInterval(vanish, 0.01);
  function vanish() {
    if (op<0) {
      clearInterval(id);} 
	else {
    elem.style.opacity=op;
	op=op-0.009;}
}}

function myMove(main_image,div_num) {
 var img = document.getElementById("image_"+div_num);	
  var elem = document.getElementById("animate_"+div_num);   
  var op=0;
  var id = setInterval(rotate, 0.01);
  function rotate() {
    if (op>1.02) {
      clearInterval(id);} 
	else {
	img.src = main_image+".jpeg";
    elem.style.opacity=op;
	op=op+0.02;}
  }
}

//when answer is correct
function after_submit(main_image,div_num,clue_image,question,level)
{ 
  alert("Congratulations ! level "+level+" cleared.");

var img=document.getElementById("image_clue");
img.src= clue_image+".jpeg";	
 var ques=document.getElementById("p_question").innerHTML=question;
 
  var imgn = document.getElementById("image_"+div_num);	
  var elem = document.getElementById("animate_"+div_num);   
  var cover = document.getElementById("cover_"+div_num);   
  var op=1;
  var pos=0;
  var id = setInterval(rotate, 0.1);
  function rotate() {
    if (pos==362) {
      clearInterval(id);} 
	else {
	imgn.src = main_image+".jpeg";
    elem.style.transform = "rotate("+pos+"deg)"; 
     cover.style.opacity=op;
     op=op-.0065;
    pos=pos+2;}
  }	
}




//when game.php loads
function onload_level(main_image,clue_image,div_num)
{

var img=document.getElementById("image_clue");
img.src= clue_image+".jpeg";
 
		
		  var imgn = document.getElementById("image_"+div_num);	
  var elem = document.getElementById("animate_"+div_num);   
  var cover = document.getElementById("cover_"+div_num);   
  var op=1;
  var pos=0;
  var id = setInterval(rotate, 0.1);
  function rotate() {
    if (pos==362) {
      clearInterval(id);} 
	else {
	imgn.src = main_image+".jpeg";
    elem.style.transform = "rotate("+pos+"deg)"; 
     cover.style.opacity=op;
     op=op-.0065;
    pos=pos+2;}
  }	
		
		
	
	
	
}



