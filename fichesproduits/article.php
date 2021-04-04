<?php $error = false;
$active = "produits";
$title = "EISTree - ";
$addtitle = "";
include($_SERVER['DOCUMENT_ROOT'] . '/includes/varSession.inc.php');
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    if (array_key_exists($_GET['id'], $articlesArbustes)) {
        $produit = $articlesArbustes[$_GET['id']];
        $addtitle = $produit['nom'];
    } elseif (array_key_exists($_GET['id'], $articlesPlantesFleuries)) {
        $produit = $articlesPlantesFleuries[$_GET['id']];
        $addtitle = $produit['nom'];
    } elseif (array_key_exists($_GET['id'], $articlesPlantesInterieur)) {
        $produit = $articlesPlantesInterieur[$_GET['id']];
        $addtitle = $produit['nom'];
    }
} else {
    $addtitle = "Article inconnu.";
}
$title .= $addtitle;
include($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');
?>
<div id="page">
    <?php
    if (isset($produit)) { ?>
        <div class="produit">
            <div class="donneesProduit">
                <img class="imageProduit" src="<?php echo $produit['img'] ?>" alt="<?php echo $produit['nom'] ?>" onmousemove="zoomIn(event, this)" onmouseout="zoomOut()" class="image">
                <div class="description">
                    <form action="/panier/toBasket.php" method="post">
                        <div id="overlay"></div>
                        <div class="general">
                            <h3 class="nom_commun"><?php echo $produit['nom'] ?></h3>
                            <h4 class="nom_scientifique"><?php echo $produit['nomscien'] ?></h4>
                            <p class="prix"><?php echo $produit['prix'] ?></p>
                            <p class="details"><?php echo $produit['desc'] ?></p>
                            <input type="hidden" name="img" value="<?php echo $produit['img'] ?>">
                            <input type="hidden" name="prix" value="<?php echo $produit['prix'] ?>">
                            <input type="hidden" name="nom" value="<?php echo $produit['nom'] ?>">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']) ?>">
                        </div>
                        <div class="ajoutpanier">
                            <div class="row-cols-1 pb-2">
                                <span class="input-group-btn noblock">
                                    <button type="button" id="minus" class="btn btn-default btn-number border" data-type="minus" onclick="decrementer(this)">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input type="text" name="amount" class="form-control input-number w-25 number d-inline-block" value="1" readonly>
                                <span class="input-group-btn">
                                    <button type="button" id="plus" class="btn btn-default btn-number border" data-type="plus" onclick="incrementer(this)">
                                        <span class="fa fa-plus"></span>
                                        <span id="stock" hidden><?php echo $produit['stock'] ?></span>
                                        <input type="hidden" name="stock" value ="<?php echo $produit['stock'] ?>" >
                                    </button>
                                </span>
                            </div>
                            <input class="boutonpanier" type="submit" value="Ajouter au panier">
                        </div>
                    </form>
                </div>
            </div>
            <div class="entretienProduit">
                <strong>Arrosage :</strong> <br>
                <strong>Luminosité :</strong> <br>
                <strong>Température :</strong> <br>
            </div>
        </div>
    <?php
    } else {
        echo "Produit Inconnu.";
    } ?>
</div>
<script src="/js/ficheproduit.js"></script>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>