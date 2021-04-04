<?php

session_start();
if (isset($_SESSION['dataPassed']) && ($_SESSION['dataPassed'])) {
    unset($_SESSION['dataPassed']);
    $data = array("uuid" => uniqid('user_'), "nom" => $_SESSION['nom'], "prenom" => $_SESSION['prenom'], "passwd" => password_hash($_SESSION['passwordo'], PASSWORD_DEFAULT));
    $inp = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json');
    $tempArray = json_decode($inp,true);
    if (!array_key_exists($_SESSION['email'], $tempArray)) {
        print_r($data);
        $tempArray[$_SESSION['email']] = $data;
        print_r($tempArray);
        $jsonData = json_encode($tempArray);
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $jsonData);
        $_SESSION['errorThrow'] = 'registeredSuccessfully';
    } else {
        $_SESSION['errorThrow'] = 'alreadyExists';
    }
    unset($_SESSION['email']);
    unset($_SESSION['nom']);
    unset($_SESSION['prenom']);
    unset($_SESSION['passwordo']);
    unset($_SESSION['passwordobis']);
    header('Location: /login/login.php');
} else {
    $_SESSION['errorThrow'] = 'missingArguments';
    header('Location: /index.php');
}
?>
