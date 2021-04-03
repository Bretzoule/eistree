<?php 
session_start();
if (isset($_SESSION['user'])) {
    $_SESSION['alreadyloggedin'] = true;
    header('Location: /index.php');
} else {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $jsonfile = '/data/users.json';
        $data = json_decode($jsonfile, TRUE);
        if (isset($data[htmlspecialchars($_POST['login'])]) && $data[htmlspecialchars($_POST['login']['password'])] == password_hash(htmlspecialchars($_POST['password']),PASSWORD_DEFAULT)) {
            
        }   
    } else {
        
    }
}

?>