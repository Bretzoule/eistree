
<?php


require($_SERVER['DOCUMENT_ROOT'] . "/db/dbConnexionManagement.php");

// getProduct //
function searchProductById($connexion,$productId)
{
    $myKeyword = "%" . strtolower($productId) . "%";
    $productsSql = "SELECT * from produits where (id LIKE :id) OR (nom LIKE :id) OR (nomscien like :id)";
    $dataStmt = $connexion->prepare($productsSql);
    $dataStmt->bindParam(':id', $myKeyword);
    $dataStmt->execute();
    if (!$dataStmt) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataStmt));
    } else {
        $data = $dataStmt->fetchAll();
        disconnectDB($connexion, array($dataStmt));
        return(empty($data) ? NULL : $data);
    }
}
?>