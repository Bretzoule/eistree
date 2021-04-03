<?php 
session_start();
if(isset($_GET['id']) && isset($_SESSION['panier'][$_GET['id']])) {
    $id = $_GET['id'];
    if ((isset($_GET['plus']))) {
        if ($_SESSION['panier'][$id][3] < $_SESSION['panier'][$id][4]) {
            $_SESSION['panier'][$id][3]++;
        } else {
            $_SESSION['stockError'] = true;
        }
    } elseif (isset($_GET['moins'])) {
        if ($_SESSION['panier'][$id][3] > 1) {
            $_SESSION['panier'][$id][3]--;
        } else {
            unset($_SESSION['panier'][$id]);
        }
    } elseif (isset($_GET['suppr'])) {
        unset($_SESSION['panier'][$id]);
    } else {
        $_SESSION['missingArguments'] = true;
    }
} else {
    $_SESSION['missingArguments'] = true;
} 
header('Location: /panier/panier.php');
?>