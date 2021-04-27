<?php

function connectDB()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . "/db/database_infos.php");
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $connexion = new PDO($dsn, USER, PASSWD);
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return($connexion);
    } catch (PDOException $e) {
        $_SESSION['errorThrow'] = 'dataBaseError';
        error_log($e);
        header('Location: /index.php');
        exit();
    }
}

function disconnectDB(&$connexion,$query) 
{
    $connexion = null;
    foreach ($query as &$element) {
        $element = null;
    }
    unset($query);
}

?>
