function handheld_menu(){$("#nav_bar").show();}




$(document).ready(function()
{
 $("#overlap").hide();
$("#contact_us").hide();
$("#about_us").hide();
$("#register").hide();
$("#rules").hide();
$("#techtatva").hide(); 
$("#nav_bar").hide();
S("#div_menu_handheld").hide();
$('#real_pass').hide();
$('#fake_pass').show(); });


$('#fake_pass').focus(function(){
    $('#fake_pass').hide(); //  hide the fake password input text
    $('#real_pass').show();
    $('#real_pass').attr('placeholder','');  	// and show the real password input password
});

// On blur of the real pass
$('#real_pass').blur(function(){
    if($(this).val() == ""){ // if the value is empty, 
        $(this).hide(); // hide the real password field
        $('#fake_pass').show(); // show the fake password
    }
   
});




 function show_contact(){
 $("#overlap").show();
  $("#contact_us").show();
 }
 
 function show_register(){
 $("#overlap").show();
  $("#register").show();
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
var fra=setInterval(frame,100);
function frame(){anime(a[i]);i++; if(i==37)clearInterval(fra);}
setTimeout(function(){
$("#techtatva").fadeIn(2000);
$("#div_menu_handheld").fadeIn(2000);},3800);



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

function myMove(x) {
 var img = document.getElementById("image_"+x);	
  var elem = document.getElementById("animate_"+x);   
  var op=0;
  var id = setInterval(rotate, 0.01);
  function rotate() {
    if (op>1.02) {
      clearInterval(id);} 
	else {
	img.src = x+".jpeg";
    elem.style.opacity=op;
	op=op+0.02;}
  }
}
