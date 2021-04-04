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
        case 'erreurAjoutProduit':
            echo banner('alert-warning', 'Erreur !', 'Impossible d\'ajouter l\'article au panier...');
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
            echo banner('alert-danger', 'Oops...', 'Identifiant ou mot de passe incorrect.');
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
        default:
            echo banner('alert-warning', 'Erreur !', 'Erreur inconnue...');
            break;
    }
    unset($_SESSION['errorThrow']);
}
