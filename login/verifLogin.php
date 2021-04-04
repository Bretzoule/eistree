<?php 
session_start();
if (isset($_SESSION['user'])) {
    $_SESSION['errorThrow'] = 'alreadyloggedin';
    header('Location: /index.php');
    exit();
} else {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $jsonfile = file_get_contents($_SERVER['DOCUMENT_ROOT']."/data/users.json");
        $data = json_decode($jsonfile, TRUE);
        if (isset($data[htmlspecialchars($_POST['login'])]) && password_verify($_POST['password'], $data[$_POST['login']]['passwd'])) {
            $_SESSION['errorThrow'] = 'loggedIn';
            $_SESSION['user'] = $_POST['login']['uuid'];
            header('Location: /index.php');
            exit();
         } else {
             $_SESSION['errorThrow'] = 'unknownUser';
         }  
    } else {
        $_SESSION['errorThrow'] = 'missingArguments';
    }
}
header('Location: /login/login.php');
?>