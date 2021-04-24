<?php
require($_SERVER['DOCUMENT_ROOT'] . "/db/dbConnexionManagement.php");

function getUser($connexion, $userMail)
{
    $usersSql = "SELECT * from users where mail = :mail";
    $dataUsers = $connexion->prepare($usersSql);
    $dataUsers->bindParam(':mail', $userMail);
    $dataUsers->execute();
    if (!$dataUsers) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataUsers));
    } else {
        $data = $dataUsers->fetch();
        disconnectDB($connexion, array($dataUsers));
        return (empty($data) ? null : $data);
    }
}

?>
