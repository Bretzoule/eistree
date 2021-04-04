<?php
$active = "panier";
$title = "EISTree - Panier";
include($_SERVER['DOCUMENT_ROOT'] . 'includes/header.php');
include($_SERVER['DOCUMENT_ROOT'] . 'includes/navbar.php');
?>
<div id="page">
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 mt-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Produit</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Prix</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantité</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Retirer</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_SESSION['panier'])) {
                                foreach ($_SESSION['panier'] as $key => $value) {  ?>
                                    <tr>
                                    <input type="hidden" name="id" value="<?php echo $key?>">
                                        <th scope="row">
                                            <div class="p-2">
                                                <img src="<?php echo $value[1] ?>" alt="imageproduit" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href=" /fichesproduits/article.php?id=<?php echo $key ?>" class="text-dark d-inline-block align-middle">
                                                            <?php echo $value[0] ?></a></h5>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle price"><strong><?php echo $value[2] ?></strong></td>
                                        <td class="align-middle">
                                            <div class="input-group w-50">
                                                <span class="input-group-btn">
                                                    <button type="button" id="minus" class="btn btn-default btn-number border" data-type="minus" onclick="window.location.href='/panier/editBasket.php?id=<?php echo $key ?>&moins'//decrementer(this)">
                                                        <span class="fa fa-minus"></span>
                                                    </button>
                                                </span>
                                                <input type="text" disabled="disabled" name="quantity" class="form-control input-number w-25 littleInput number" value="<?php echo $value[3] ?>" min="1">
                                                <span class="input-group-btn">
                                                   <button id="plus" class="btn btn-default btn-number border" data-type="plus" onclick="window.location.href='/panier/editBasket.php?id=<?php echo $key ?>&plus'//incrementer(this)">
                                                        <span class="fa fa-plus"></span>
                                                    </button>
                                                    <span id="stock" hidden><?php echo $value[4] ?></span>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="align-middle"><a href="/panier/editBasket.php?id=<?php echo $key ?>&suppr" onclick="//removeElement(this)" class="text-dark"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php } 
                                    }?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

                <div class="p-4 bg-white rounded shadow-sm">
                    <div class="col">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Résumé commande
                        </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Les frais de ports sont calculés à partir de la taille de
                                votre commande.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-Total</strong><strong id="subtotal"></strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Frais de port</strong><strong id="shipping"></strong>
                                </li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">TVA (5%)</strong><strong id="taxes"></strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold" id="total"></h5>
                                </li>
                            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Passer au
                                paiement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/panier.js"></script>
<?php
include($_SERVER['DOCUMENT_ROOT'] . 'includes/footer.php');
?>