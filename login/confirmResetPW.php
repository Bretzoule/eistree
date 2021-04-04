<?php
session_start();
if (isset($_SESSION['dataPassed']) && ($_SESSION['dataPassed'])) {
    unset($_SESSION['dataPassed']);
    $inp = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json');
    $tempArray = json_decode($inp,true);
    if (array_key_exists($_SESSION['email'], $tempArray)) {
        $tempArray[$_SESSION['email']]['passwd'] = password_hash($_SESSION['passwordo'], PASSWORD_DEFAULT);
        $jsonData = json_encode($tempArray);
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $jsonData);
        $_SESSION['errorThrow'] = 'pwChanged';
    } else {
        $_SESSION['errorThrow'] = 'doesntExist';
    }
    unset($_SESSION['email']);
    unset($_SESSION['passwordo']);
    unset($_SESSION['passwordobis']);
    header('Location: /login/login.php');
} else {
    $_SESSION['errorThrow'] = 'missingArguments';
    header('Location: /index.php');
}
?>