<?php

$question_id = $_POST['question_id']  ?? NULL;
$answer = $_POST['answer']  ?? NULL;
$possible_answers = [0, 1, 2, 3];

if (empty($question_id) || $answer === NULL) {
    error('No Input');
}

if (!is_numeric($question_id) || !in_array($answer, $possible_answers)) {
    error('Invalid Input');
}


$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT 1 FROM answers WHERE user_id = :user_id AND question_id = :question_id');
$stmt->execute(['user_id' => $user_id, 'question_id' => $question_id]);
$result = $stmt->fetchColumn();
if ($result) {
    error('Already Answered!');
}

$stmt = $pdo->prepare('INSERT INTO answers VALUES(:user_id,:question_id,:answer)');
$stmt->execute(['user_id' => $user_id, 'question_id' => $question_id, 'answer' => $answer]);

$score = getScore($pdo);

$stmt = $pdo->prepare('SELECT answer FROM questions WHERE question_id = :question_id');
$stmt->execute(['question_id' => $question_id]);
$correct_answer = $stmt->fetchColumn();
if ($answer == $correct_answer) {
    success('CORRECT', ['score' => $score]);
} else {
    success('INCORRECT', ['score' => $score]);
}

