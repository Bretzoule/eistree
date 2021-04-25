<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-type:application/json;charset=utf-8');
if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    $validArticleCounter = 0;
    require($_SERVER['DOCUMENT_ROOT'] . '/db/orderQuery.php');
    $connexion = connectDB();
    foreach ($_SESSION['panier'] as $key => $value) {
        $validArticleCounter += (validArticle($connexion, $key, $value[3])) ? 1 : 0;
    }
    if ($validArticleCounter === count($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $key => $value) {
            $connexion = connectDB();
            editStock($connexion, $key, $value[3]);
        }
        $message = ['alert-success','Parfait !', 'Votre commande est entre nos mains :)'];
        
    } else {
        $message = ['alert-warning','Erreur !', 'Vous ne pouvez pas commander ces articles... merci de refaire votre panier.'];
    }
    unset($_SESSION['panier']);
    echo json_encode($message);
} else {
    $message = ['alert-warning','Eh !', 'Vous ne pouvez pas faire ça, votre panier semble vide...'];
    echo json_encode($message);
}
