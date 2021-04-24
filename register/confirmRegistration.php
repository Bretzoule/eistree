<?php

function unsetAll()
{
    unset($_SESSION['email']);
    unset($_SESSION['nom']);
    unset($_SESSION['prenom']);
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
    $data = array("mail" => $_SESSION['email'], "uuid" => uniqid('user_'), "nom" => $_SESSION['nom'], "prenom" => $_SESSION['prenom'], "pass" => password_hash($_SESSION['passwordo'], PASSWORD_DEFAULT));
    require($_SERVER['DOCUMENT_ROOT'] . '/db/registerQuery.php');
    $connexion = connectDB();
    if (getMailUser($connexion, $data['mail'])) {
        $connexion = connectDB();
        insertDataUsers($connexion, $data);
        $_SESSION['errorThrow'] = 'registeredSuccessfully';
    } else {
        $_SESSION['errorThrow'] = 'alreadyExists';
    }
    unsetAll();
    header('Location: /login/login.php');
} else {
    $_SESSION['errorThrow'] = 'missingArguments';
    header('Location: /index.php');
}

// old // 







    // $inp = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json');
    // $tempArray = json_decode($inp,true);
    // if (!array_key_exists($_SESSION['email'], $tempArray)) {
    //     $tempArray[$_SESSION['email']] = $data;
    //     $jsonData = json_encode($tempArray);
    //     file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $jsonData);
    //     $_SESSION['errorThrow'] = 'registeredSuccessfully';
//     } else {
//         $_SESSION['errorThrow'] = 'alreadyExists';
//     }
//     unset($_SESSION['email']);
//     unset($_SESSION['nom']);
//     unset($_SESSION['prenom']);
//     unset($_SESSION['passwordo']);
//     unset($_SESSION['passwordobis']);
//     header('Location: /login/login.php');
// } else {
//    $_SESSION['errorThrow'] = 'missingArguments';
//    header('Location: /index.php');
// }
