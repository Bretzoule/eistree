<?php 
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    // si l'on fait un session_destroy ici, on détruirait le panier que l'utilisateur aurait potentiellement construit, c'est pour cela que l'on ne fait que détruire sa variable utilisateur
    $_SESSION['errorThrow'] = "loggedOut";
} else {
    $_SESSION['errorThrow'] = "missingArguments";
}
header('Location: /index.php');
?>