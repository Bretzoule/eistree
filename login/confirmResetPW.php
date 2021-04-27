<?php

function unsetAll()
{
    unset($_SESSION['email']);
    unset($_SESSION['passwordo']);
    unset($_SESSION['passwordobis']);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $_SESSION['errorThrow'] = 'alreadyloggedin';
    header('Location: /index.php');
    exit();
}
if (isset($_SESSION['dataPassed']) && ($_SESSION['dataPassed'])) {
    unset($_SESSION['dataPassed']);
    $currentMail = htmlspecialchars($_SESSION['email']);
    $nouveauMdp = password_hash(htmlspecialchars($_SESSION['passwordo']), PASSWORD_DEFAULT);
    require($_SERVER['DOCUMENT_ROOT'] . '/db/registerQuery.php');
    $connexion = connectDB();
    if (!getMailUser($connexion, $currentMail)) {
        $connexion = connectDB();
        changePw($connexion, $currentMail, $nouveauMdp);
        $_SESSION['errorThrow'] = 'pwChanged';
    } else {
        $_SESSION['errorThrow'] = 'doesntExist';
    }
    // $inp = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json');
    // $tempArray = json_decode($inp,true);
    // if (array_key_exists($_SESSION['email'], $tempArray)) {
    //     $tempArray[$_SESSION['email']]['passwd'] = password_hash($_SESSION['passwordo'], PASSWORD_DEFAULT);
    //     $jsonData = json_encode($tempArray);
    //     file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $jsonData);
    //     $_SESSION['errorThrow'] = 'pwChanged';
    // } else {
    //     $_SESSION['errorThrow'] = 'doesntExist';
    // }
    unsetAll();
    header('Location: /login/login.php');
} else {
    $_SESSION['errorThrow'] = 'missingArguments';
    header('Location: /index.php');
}
