var questionPopup=document.getElementById("questionPopup");
var questionImage=document.getElementById("questionImage");
var questionText=document.getElementById('questionText');
var textfield=document.getElementById('answer');
var scoreValue=document.getElementById('scoreValue');
var resetValue=document.getElementById('resetValue');
var levelValue=document.getElementById('levelValue');

$.ajaxSetup({
  dataType: 'json',
  type: 'POST',
});
$(document).ajaxComplete(function(event, xhr, settings) {
    var response=xhr.responseJSON;
    if(response.hasOwnProperty('redirect'))
    {
        window.location=response.redirect;
        return;
    }
    if(response.hasOwnProperty('score'))
      scoreValue.innerHTML=response.score;
    if(response.hasOwnProperty('resets'))
      resetValue.innerHTML=response.resets;
    if(response.hasOwnProperty('level'))
      levelValue.innerHTML=response.level;
    if(response.hasOwnProperty('milestone'))
      alert("You crossed a milestone!");

    if(response.hasOwnProperty('error'))
      alert(response.error);
    
    console.log(response);
});
$(document).ajaxError(function(event, xhr, settings, thrownError) {
    console.log('AJAX error!');
    console.log(xhr.responseJSON);
    console.log(thrownError);
});

function quizPop()
{
  context.globalAlpha = 2.0;
  context.globalAlpha = 1.0;
  document.getElementById('pauseImg').style.display='none';
  questionPopup.style.display='block';
  if(resetValue.innerHTML==="0")
    document.getElementById('retryButton').style.display='none';
  $.ajax({
    url: 'api/getQuestion.php',
    //type: 'POST',
    //dataType: 'json',
    data: {},
  })
  .done(function(response) {
    if(response.hasOwnProperty('redirect'))
    {
      window.location=response.redirect;
      return;
    }
    questionDisp(response.question, response.image);
    console.log("success");
  });
}

function questionDisp(question, image)
{
  questionText.innerHTML=question;
  if(image)
    questionImage.setAttribute('src', 'images/questions/'+image+'.png');
  else
    questionImage.setAttribute('src', '');

  $("#textfield").focus();
}

function submitAnswer()
{
  var useranswer=textfield.value;
  useranswer = useranswer.replace(/[^\w]/gi, ''); //Allow only digits, alphabets, and underscore 
  textfield.value="Submitting...";
  console.log('Submitting: ' + useranswer);

  $.ajax({
    url: 'api/checkAnswer.php',
    //type: 'POST',
    //dataType: 'json',
    data: {input: useranswer},
  })
  .done(function(response) {
    console.log("success");
    if(response.correct)
      hideQuestion();
    else
      //textfield.value="Incorrect!";
      textfield.value=response.message;
  });
}

function hideQuestion()
{
  answer=true;
  pause=false;
  document.getElementById('pauseImg').style.display='block';
  questionText.innerHTML="Getting question...";
  textfield.value="";
  questionPopup.style.display='none';
  requestAnimFrame(function(){animate();});
}

function retry()
{
  textfield.value="Retrying...";
  $.ajax({
    url: 'api/retry.php',
    data: {},
  })
  .done(function(response) {
    console.log("success");
    if(response.success)
    {
      alert('Retry success!');
      location.reload();
    }
  });
}