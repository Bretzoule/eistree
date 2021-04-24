<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/index.css">
    <?php
    if (in_array($active, array("contact", "register", "login"))) {
        echo  '<link rel="stylesheet" href="/login/login.css">';
    } elseif ($active === "panier") {
        echo '<link rel="stylesheet" href="/panier/panier.css">';
    }
    ?>
    <title><?= $title ?></title>
</head>

<body>
    <header id="mainheader">
        <?php include($_SERVER['DOCUMENT_ROOT'] .'/includes/errorbanners.php');?>
        <a href="/index.php"><img id="logoTopDroit" src="/assets/textlogo.png" alt="fleur"></a>
    </header>