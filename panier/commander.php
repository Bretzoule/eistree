<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    $erreur = false;
    $validArticleCounter = 0;
    require($_SERVER['DOCUMENT_ROOT'] . '/db/orderQuery.php');
    $connexion = connectDB();
    foreach ($_SESSION['panier'] as $key => $value) {
        $validArticleCounter += (validArticle($connexion, $key, $value[4])) ? 1 : 0;
    }
    if ($validArticleCounter === count($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $key => $value) {
            $connexion = connectDB();
            editStock($connexion, $key, $value);
        }
        $_SESSION['errorThrow'] = 'succesCommande';
    } else {
        $_SESSION['errorThrow'] = 'erreurCommande';
    }
    unset($_SESSION['panier']);
    header('Location: /login/login.php');
} else {
    $_SESSION['errorThrow'] = 'missingArguments';
    header('Location: /index.php');
}
