<?php
$sql = 'SELECT 
subjects.name,10*count(*) as score FROM 
answers 
INNER JOIN questions ON answers.question_id=questions.question_id 
INNER JOIN subjects ON subjects.subject_id=questions.subject_id 
WHERE answers.answer=questions.answer AND answers.user_id=:user_id
GROUP BY questions.subject_id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$subjects = $stmt->fetchAll();
?>
<table class="table" style="width:60%;margin:0 auto;">
    <thead>
    <tr>
        <th>Subject</th>
        <th>Score</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($subjects as $subject) { ?>
        <tr>
            <td>
                <?= $subject['name']; ?>
            </td>
            <td>
                <?= $subject['score']; ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<center>
    <a href="<?= HOMEPAGE; ?>/quiz" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> Take the quiz
    </a>
</center>
