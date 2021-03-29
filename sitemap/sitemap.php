<?php
$active = "sitemap";
$title = "EISTree - Plan du site.";
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php');
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>Plan du site &#x1F5FA; </b></p>
        <ul id="sitemapul">
            <p class="petitTitreSection">Pages standards :</p>
            <li><a href="/index.php">Accueil</a></li>
            <li><a href="/listesproduits/produits.php">Nos produits</a></li>
            <ul>
                <li><a href="/listesproduits/arbustes.html">Arbustes (remplacé par recherche PHP dans le futur)</a>
                </li>
                <li> <a href="/listesproduits/plantesfleuries.html">Plantes Fleuries (remplacé par recherche PHP
                        dans le futur)</a></li>
                <li><a href="/listesproduits/plantesinterieur.html">Plantes d'Interieur (remplacé par recherche PHP
                        dans le futur)</a></li>
                <ul>
                    <li><a href="/fichesproduits/monstera.html">Fiche produit Monstera (remplacé par requete PHP
                            dans le futur)</a></li>
                </ul>
            </ul>
            <li> <a href="/panier/panier.php">Panier</a>
            </li>
            <li> <a href="/contact/contact.php">Contact</a>
            </li>
            <p class="petitTitreSection">Pages de compte :</p>
            <li> <a href="/login/login.php">Se connecter</a>
            </li>
            <li> <a href="/register/register.php">S'enregistrer</a>
            </li>
        </ul>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'].'includes/footer.php');
?>