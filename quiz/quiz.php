<?php
 
$stmt = $pdo->prepare('SELECT * from subjects');
$stmt->execute();
$subjects = $stmt->fetchAll();

?>


<div class="row" id="quiz">
    <center><h3 style="margin-top:5px">Your Score is <span class="score"><?= getScore($pdo); ?></span></h3></center>
    <div id="subjects" class="list-group list-group-root well col-sm-3">


        <?php $i = 0;
        foreach ($subjects as $subject) {
            $i++; ?>
            <div class="subject" data-subjectid="<?= $subject['subject_id']; ?>">
                <a href="#subject_<?= $i; ?>" class="list-group-item" data-toggle="collapse">
                    <i class="glyphicon glyphicon-chevron-right"></i><?= $subject['name']; ?>
                </a>
                <div class="questions list-group collapse" id="subject_<?= $i; ?>"></div>
            </div>


        <?php } ?>


    </div>
    <div id="question" class="col-sm-9">

    </div>
</div>
<script>
    $(function () {

// Fetch questions of a particular subject on clicking the subject name from the menu.
        $('.subject').on('shown.bs.collapse', function () {
            var subject_id = $(this).attr('data-subjectid');
            var subject = this;
            $.ajax({
                type: 'GET',
                url: '<?=HOMEPAGE;?>/api/questions',
                data: {'subject_id': subject_id},
                success: function (data) {
                    var q = '';
                    var i = 1;
                    $.each(data.questions, function (key, value) {
                        var temp;
                        if (value.correct === 1) {
                            temp = '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
                        }
                        else if (value.correct === 0) {
                            temp = '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
                        }
                        else temp = '';

                        q = q + '<a href="#" id="q_' + value.question_id + '" class="list-group-item" data-questionid="' + value.question_id + '">Q' + i++ + temp + '</a>';
                    });
                    $(subject).find('.questions').html(q);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }


            });
        });


// Fetch the question
        $('.questions').on('click', 'a', function () {
            var question_id = $(this).attr('data-questionid');
            var questionPanel = $('#question');

            $.ajax({
                type: 'GET',
                url: '<?=HOMEPAGE;?>/api/questions',
                data: {'question_id': question_id},
                success: function (data) {
                    var q = data.question;
                    var a = '<div class="panel panel-default"> <div class="panel-heading">';
                    a = a + q.question;
                    a += '</div><div class="panel-body">';
                    a += '<div class="options">';
                    $.each(jQuery.parseJSON(q.options), function (key, value) {
                        a = a + '<div class="radio"><label><input type="radio" value="' + key + '" name="answer">' + value + '</label></div>';
                    });
                    a += '</div><a href="#" id="submit" class="submit-answer btn btn-primary">Submit</a> ' +

                        '<div style="margin-top: 5px;" class="alert"></div>' +
                        '</div></div>';

                    $(questionPanel).html(a);
                    $(questionPanel).attr('data-questionid', q.question_id);
                    if (jQuery.inArray(q.answer, ["0", "1", "2", "3"]) !== -1) {
                        $(questionPanel).find('#submit,input[type=radio]').addClass('disabled');
                        $("input[type=radio][value=" + q.answer + "]").attr('checked', 'checked');

                        if (q.correct) {
                            $('#question').find('.alert').removeClass('hidden').removeClass('alert-danger').addClass('alert-success').html('Correct Answer');

                        }
                        else {
                            $('#question').find('.alert').removeClass('hidden').removeClass('alert-success').addClass('alert-danger').html('Incorrect Answer');
                        }
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                }


            });

        });

// Submit answer
        $('#question').on('click', '#submit', function () {
            var question_id = $('#question').attr('data-questionid');
            var answer = $('#question').find("input[name='answer']:checked").val();


            $.ajax({
                type: 'POST',
                url: '<?=HOMEPAGE;?>/api/answer',
                data: {
                    'question_id': question_id,
                    'answer': answer
                },
                success: function (data) {
                    $('#question').find('#submit,input[type=radio]').addClass('disabled');
                    $('.score').html(data.score);
                    if (data.message === "CORRECT") {
                        $('#question').find('.alert').removeClass('hidden').removeClass('alert-danger').addClass('alert-success').html(data.message);
                        $('#subjects').find('#q_' + question_id).append('<span class="glyphicon glyphicon-ok" style="color:green"></span>');

                    }
                    else {
                        $('#question').find('.alert').removeClass('hidden').removeClass('alert-success').addClass('alert-danger').html(data.message);
                        $('#subjects').find('#q_' + question_id).append('<span class="glyphicon glyphicon-remove" style="color:red"></span>');

                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $('#question').find('.alert').removeClass('hidden').removeClass('alert-success').addClass('alert-danger').html(xhr.responseJSON.message);

                }


            });

        });


        $('.list-group-item').on('click', function () {
            $('.glyphicon', this)
                .toggleClass('glyphicon-chevron-right')
                .toggleClass('glyphicon-chevron-down');
        });

    });

</script>
