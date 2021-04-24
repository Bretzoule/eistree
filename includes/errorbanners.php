<?php


function banner($alert, $pretext, $text)
{
    return '<div onload="autoremove(this)" class="alert ' . $alert . ' float alert-dismissible position-absolute myAlert">
    <strong>' . $pretext . '</strong> ' . $text . '
    <a href="#" class="closebtn" data-dismiss="alert">×</a>
    </div>';
}

/*  Gestion d'erreurs  */
if (isset($_SESSION['errorThrow'])) {
    switch ($_SESSION['errorThrow']) {
        case 'ajoutProduitSuccess':
            echo banner('alert-success', 'Au panier !', 'Produit ajouté avec succès');
            break;
        case 'dataBaseError':
            echo banner('alert-warning', 'Erreur !', 'Connexion à la BDD Impossible...');
            session_destroy();
            break;
        case 'erreurAjoutProduit':
            echo banner('alert-warning', 'Erreur !', 'Impossible d\'ajouter l\'article au panier...');
            break;
        case 'erreurCommande':
            echo banner('alert-warning', 'Erreur !', 'Impossible de commander ces articles, merci de refaire votre panier.');
            break;
        case 'erreurCommande':
            echo banner('alert-success', 'Parfait !', 'Votre commande est entre nos mains :)');
            break;
        case 'missingArguments':
            echo banner('alert-warning', 'Eh !', 'Vous ne pouvez pas faire ça...');
            break;
        case 'loginFirst':
            echo banner('alert-warning', 'Eh !', 'Vous devez être connecté pour faire ça...');
            break;
        case 'stockError':
            echo banner('alert-warning', 'Impossible !', 'Stock insuffisant !');
            break;
        case 'unknownUser':
            echo banner('alert-warning', 'Oops...', 'Identifiant ou mot de passe incorrect.');
            break;
        case 'alreadyloggedin':
            echo banner('alert-warning', 'Impossible !', 'Vous êtes déjà connecté !');
            break;
        case 'loggedIn':
            echo banner('alert-success', 'Connecté !', 'Vous vous êtes connecté avec succès.');
            break;
        case 'loggedOut':
            echo banner('alert-success', 'Déconnecté !', 'Vous vous êtes déconnecté avec succès.');
            break;
        case 'mailEnvoye':
            echo banner('alert-success', 'Envoyé !', 'Votre mail à été envoyé à notre équipe !');
            break;
        case 'alreadyExists':
            echo banner('alert-warning', 'Oops !', 'Un compte existe déjà avec cet email.');
            break;
        case 'registeredSuccessfully':
            echo banner('alert-success', 'All green !', 'Votre compte à été créé !');
            break;
        case 'doesntExist':
            echo banner('alert-warning', 'Red flag !', 'Il n\'existe aucun compte avec cet email.');
            break;
        case 'pwChanged':
            echo banner('alert-success', 'All green !', 'Mot de passe changé avec succès.');
            break;
        default:
            echo banner('alert-danger', 'Erreur !', 'Erreur inconnue...');
            break;
    }
    if (isset($_SESSION['errorThrow'])) {
        unset($_SESSION['errorThrow']);
    };
}
