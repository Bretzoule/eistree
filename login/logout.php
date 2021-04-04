<?php 
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    $_SESSION['errorThrow'] = "loggedOut";
} else {
    $_SESSION['errorThrow'] = "missingArguments";
}
header('Location: /index.php');
?>