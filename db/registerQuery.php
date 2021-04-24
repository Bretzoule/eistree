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

function insertDataUsers($connexion, $data)
{
    $usersInsert = "INSERT INTO `users` (`mail`,`uuid`, `nom`, `prenom`, `pass`) VALUES (:mail, :uuid, :nom, :prenom, :pass)";
    $dataUsers = $connexion->prepare($usersInsert);
    $dataUsers->bindParam(':mail', $data['mail']);
    $dataUsers->bindParam(':uuid', $data['uuid']);
    $dataUsers->bindParam(':nom', $data['nom']);
    $dataUsers->bindParam(':prenom', $data['prenom']);
    $dataUsers->bindParam(':pass', $data['pass']);
    $dataUsers->execute();
    if (!$dataUsers) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        disconnectDB($connexion, array($dataUsers));
        unsetAll();
        header('Location: /index.php');
        exit();
    } else {
        disconnectDB($connexion, array($dataUsers));
    }
}

function changePw($connexion, $userMail, $newPw)
{
    $usersSql = "UPDATE users SET pass = :pw WHERE mail = :mail";
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
