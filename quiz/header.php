<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= getTitle(); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= HOMEPAGE; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= HOMEPAGE; ?>/assets/css/main.css">
    <script src="<?= HOMEPAGE; ?>/assets/js/jquery-3.1.0.min.js"></script>

    <script src="<?= HOMEPAGE; ?>/assets/js/bootstrap.min.js"></script>

</head>
<body>

<header class="navbar navbar-static-top navbar-inverse" style="margin-bottom:1px" id="top">
    <div class="container1">
        <div class="navbar-header">
            <a href="<?= HOMEPAGE; ?>" class="navbar-brand">Quiz</a>
        </div>
        <ul class="nav navbar-nav">
            <?php if (isLoggedIn()) { ?>
                <li>
                    <a href="<?= HOMEPAGE; ?>/dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="<?= HOMEPAGE; ?>/quiz">Quiz</a>
                </li>
                <li>
                    <a href="<?= HOMEPAGE; ?>/logout">Logout</a>
                </li>
            <?php } ?>

        </ul>
    </div>
</header>