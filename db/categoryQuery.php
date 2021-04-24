
<?php

require($_SERVER['DOCUMENT_ROOT'] . "/db/dbConnexionManagement.php");

// get data from DB //

function getCategory($connexion,$catID)
{
    $myKeyword = "%" . $catID . "%";
    $productsSql = "SELECT id from categories where nom LIKE :nom";
    $dataStmt = $connexion->prepare($productsSql);
    $dataStmt->bindParam(':nom', $myKeyword);
    $dataStmt->execute();
    if (!$dataStmt) {
        $_SESSION['errorThrow'] = 'dataBaseError';
    } else {
        $cat = $dataStmt->fetch()['id'];
        $categorySql = "SELECT * from produits WHERE categoryid = :id";
        $categoryStmt = $connexion->prepare($categorySql);
        $categoryStmt->bindParam(':id', $cat);
        $categoryStmt->execute();
        $data = $categoryStmt->fetchAll();
        disconnectDB($connexion, array($categoryStmt,$dataStmt));
        return(empty($data) ? NULL : $data);
    }
}

function queryAll($connexion)
{
    $productsSql = "SELECT * from produits";
    $dataStmt = $connexion->prepare($productsSql);
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