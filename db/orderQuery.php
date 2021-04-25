<?php 

require($_SERVER['DOCUMENT_ROOT'] . "/db/dbConnexionManagement.php");
function validArticle($connexion, $productID, $quantity)
{
    $usersSql = "SELECT stock from produits where id = :id";
    $dataUsers = $connexion->prepare($usersSql);
    $dataUsers->bindParam(':id', $productID);
    $dataUsers->execute();
    if (!$dataUsers) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataUsers));
    } else {
        $data = $dataUsers->fetch();
        disconnectDB($connexion, array($dataUsers));
        return($data >= $quantity);
    } 
}

function editStock($connexion, $id, $quantity)
{
    $stockSql = "SELECT stock from produits where id = :id";
    $dataStock = $connexion->prepare($stockSql);
    $dataStock->bindParam(':id', $id);
    $dataStock->execute();
    if (!$dataStock) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataStock));
    } else {
        $tmpValue = intval($dataStock->fetch()['stock'],10);
        $value = $tmpValue - $quantity;
        $upstockSql = "UPDATE produits SET stock = :value WHERE id = :id";
        $dataUpStock = $connexion->prepare($upstockSql);
        $dataUpStock->bindParam(':id', $id);
        $dataUpStock->bindParam(':value', $value);
        $dataUpStock->execute();
        if (!$dataUpStock) {
            $_SESSION['errorThrow'] = 'dataBaseError';
            disconnectDB($connexion, array($dataUpStock, $dataStock));
            unsetAll();
            header('Location: /index.php');
        } else {
            disconnectDB($connexion, array($dataUpStock, $dataStock));
        }
    }
}

?>