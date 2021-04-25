<?php 
session_start();
if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['img']) && isset($_POST['amount']) && isset($_POST['id']) && 
    isset($_POST['stock']) && (intval($_POST['amount'],10) > 0) && 
    (intval($_POST['stock'],10) >= intval($_POST['amount']))) {
    if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
    }
    $id = htmlspecialchars($_POST['id']);
    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id][3] += intval($_POST['amount']);
    } else {
        $_SESSION['panier'][$id] = array(htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['img']),htmlspecialchars($_POST['prix']),htmlspecialchars(intval($_POST['amount'],10)),  htmlspecialchars(intval($_POST['stock'],10)), htmlspecialchars($_POST['id']));
    }
    $_SESSION['errorThrow'] = 'ajoutProduitSuccess';
    header('Location: /fichesproduits/article.php?id='. htmlspecialchars($_POST['id']));
    exit();
} else {
    $_SESSION['errorThrow'] = 'erreurAjoutProduit';
    header('Location: /listesproduits/produits.php');
}
?>