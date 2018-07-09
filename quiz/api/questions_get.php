<?php

$subject_id = $_GET['subject_id']  ?? NULL;
$question_id = $_GET['question_id'] ?? NULL;


if (!empty($subject_id) && empty($question_id)) {

    if (!is_numeric($subject_id)) {
        error('Invalid Input');
    }
    $sql = 'SELECT 
questions.question_id,COALESCE((answers.answer=questions.answer),-1) as correct 
FROM questions 
LEFT OUTER JOIN answers ON (questions.question_id=answers.question_id AND answers.user_id=:user_id) 
WHERE questions.subject_id = :subject_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['subject_id' => $subject_id, 'user_id' => $_SESSION['user_id']]);
    $questions = $stmt->fetchAll();
    if ($questions) {
        success('', ['questions' => $questions]);
    } else {
        error();
    }

}


if (!empty($question_id) && empty($subject_id)) {
    if (!is_numeric($question_id)) {
        error('Invalid Input');
    }
    $sql = 'SELECT 
answers.answer,questions.question,questions.options,questions.question_id,(answers.answer=questions.answer) as correct 
FROM questions 
LEFT OUTER JOIN answers ON (questions.question_id=answers.question_id AND answers.user_id=:user_id) 
WHERE questions.question_id = :question_id';
    $stmt = $pdo->prepare($sql);


    $stmt->execute(['question_id' => $question_id, 'user_id' => $_SESSION['user_id']]);
    $question = $stmt->fetch();
    if ($question) {
        success('', ['question' => $question]);
    } else {
        error();
    }

}


error('Error');






    
