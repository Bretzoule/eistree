
<?php


require($_SERVER['DOCUMENT_ROOT'] . "/db/dbConnexionManagement.php");

// getProduct //
function getProductByID($connexion,$productId)
{
    $myKeyword = "%" . $productId . "%";
    $productsSql = "SELECT * from produits where id LIKE :id";
    $dataStmt = $connexion->prepare($productsSql);
    $dataStmt->bindParam(':id', $myKeyword);
    $dataStmt->execute();
    if (!$dataStmt) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataStmt));
    } else {
        $data = $dataStmt->fetch();
        disconnectDB($connexion, array($dataStmt));
        return(empty($data) ? NULL : $data);
    }
}
?>