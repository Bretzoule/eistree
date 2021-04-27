<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//header('Content-type:application/json;charset=utf-8');
$message = array();
if (!isset($_GET['recherche']) && empty($_GET['recherche'])) {
    array_push($message, ['Erreur...', '']);
} else {
    $searchTags = htmlspecialchars($_GET['recherche']);
    require($_SERVER['DOCUMENT_ROOT'] . '/db/searchQuery.php');
    $connexion = connectDB();
    $myData = searchProductById($connexion, $searchTags);
    if ($myData !== NULL) {
        foreach ($myData as $element => $item) {
            array_push($message, [$item['nom'], $item['id']]);
        }
    } else {
        array_push($message, ['Aucun résultat', '']);
    }
}
echo json_encode(array_values($message));

?>
