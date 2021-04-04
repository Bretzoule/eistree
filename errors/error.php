<?php
$active = "sitemap";
$title = "EISTree - Plan du site.";
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php');
if (isset($_GET['error'])) {
    switch (htmlspecialchars($_GET['error'])) {
        case '404':
            $text = "Erreur 404 - Page Introuvable :(";
            break;
        case '403':
            $text = "Erreur 403 - Vous n'avez pas accès à cette ressource... :(";
            break;
        case '500':
            $text = "Erreur 500 - Oops, erreur serveur, si ce problème persiste, merci de contacter l'administrateur du site.";
            break;
        default:
            $text = "Erreur 42069 - Une erreur inconnue s'est produite...";
            break;
    }
}   
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b><?= $text ?></b></p>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'].'includes/footer.php');
?>