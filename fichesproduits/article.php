<?php $error = false;
$active = "produits";
$title = "EISTree - ";
$addtitle = "";
require($_SERVER['DOCUMENT_ROOT'] . '/db/productsQuery.php');
$connexion = connectDB();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $data = getProductByID($connexion, $id);
    if (isset($data)) {
        $addtitle = $data['nom'];
    } else {
        $addtitle = "Article inconnu.";
    }
} else {
    $addtitle = "Erreur...";
    $_SESSION['errorThrow'] = "missingArguments";
}
$title .= $addtitle;
include($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');
?>
<div id="page">
    <?php
    if (!empty($data)) { ?>
        <div class="produit">
            <div class="donneesProduit">
                <img class="imageProduit" src="<?php echo $data['img'] ?>" alt="<?php echo $data['nom'] ?>" onmousemove="zoomIn(event, this)" onmouseout="zoomOut()" class="image">
                <div class="description">
                    <form action="/panier/toBasket.php" method="post">
                        <div id="overlay"></div>
                        <div class="general">
                            <h3 class="nom_commun"><?php echo $data['nom'] ?></h3>
                            <h4 class="nom_scientifique"><?php echo $data['nomscien'] ?></h4>
                            <p class="prix"><?php echo $data['prix'] ?>€</p>
                            <p class="details"><?php echo $data['description'] ?></p>
                            <input type="hidden" name="img" value="<?php echo $data['img'] ?>">
                            <input type="hidden" name="prix" value="<?php echo $data['prix'] ?>">
                            <input type="hidden" name="nom" value="<?php echo $data['nom'] ?>">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']) ?>">
                        </div>
                        <div class="ajoutpanier">
                            <div class="row-cols-1 pb-2">
                                <span class="input-group-btn noblock">
                                    <button type="button" id="minus" class="btn btn-default btn-number border" data-type="minus" onclick="decrementer(this)">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input type="text" name="amount" class="form-control input-number w-25 number d-inline-block" value="<?php echo ($data['stock'] > 0) ? 1 : 0; ?>" readonly>
                                <span class="input-group-btn">
                                    <button type="button" id="plus" class="btn btn-default btn-number border" data-type="plus" onclick="incrementer(this)">
                                        <span class="fa fa-plus"></span>
                                        <span id="stock" hidden><?php echo $data['stock'] ?></span>
                                        <input type="hidden" name="stock" value="<?php echo $data['stock'] ?>">
                                    </button>
                                </span>
                            </div>
                            <?php
                            if ($data['stock'] > 0) { ?>
                                <input class="boutonpanier" type="submit" value="Ajouter au panier">
                            <?php } else { ?>
                                <div class='mt-3 alert alert-warning'>Cet article n'est plus disponible...</div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="entretienProduit">
                <strong><?php if (!empty($data['arrosage'])) {
                            echo 'Arrosage : ' . $data['arrosage'] . "<br>";
                        } ?></strong>
                <strong><?php if (!empty($data['luminosite'])) {
                            echo 'Luminosité : ' . $data['luminosite'] . "<br>";
                        } ?></strong>
                <strong><?php if (!empty($data['temp'])) {
                            echo 'Température : ' . $data['temp'] . " <br>";
                        } ?></strong>
                <strong><?php if (!empty($data['feuillage'])) {
                            echo 'Feuillage : ' . $data['feuillage'] . "<br>";
                        } ?></strong>
                <strong><?php if (!empty($data['hauteur'])) {
                            echo 'Hauteur : ' . $data['hauteur'] . "<br>";
                        } ?></strong>
                <strong><?php if (!empty($data['floraison'])) {
                            echo 'Floraison : ' . $data['floraison'] . "<br>";
                        } ?></strong>
            </div>
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