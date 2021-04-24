<?php 

require($_SERVER['DOCUMENT_ROOT'] . "/db/dbConnexionManagement.php");
function getMailUser($connexion, $userMail)
{
    $myKeyword = "%" . $userMail . "%";
    $usersSql = "SELECT mail from users where mail LIKE :mail";
    $dataUsers = $connexion->prepare($usersSql);
    $dataUsers->bindParam(':mail', $myKeyword);
    $dataUsers->execute();
    if (!$dataUsers) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataUsers));
    } else {
        $data = $dataUsers->fetch();
        disconnectDB($connexion, array($dataUsers));
        return(empty($data));
    }
}

function editStock($connexion, $id, $quantity)
{

    $usersSql = "UPDATE products SET stock = ((SELECT stock from products WHERE id = :id) - :quantity) WHERE mail = :mail";
    $dataUsers = $connexion->prepare($usersSql);
    $dataUsers->bindParam(':mail', $userMail);
    $dataUsers->bindParam(':pw', $newPw);
    $dataUsers->execute();
    if (!$dataUsers) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataUsers));
        unsetAll();
        header('Location: /index.php');
    } else {
        $data = $dataUsers->fetch();
        disconnectDB($connexion, array($dataUsers));
        return (empty($data));
    }
}

?>