<?php
$active = "produits";
$title = "EISTree - ";
include($_SERVER['DOCUMENT_ROOT'] . 'includes/varSession.inc.php');
if (isset($_GET['cat'])) {
    switch ($_GET['cat']) {
        case 'arbustes':
            $addtitle = "Nos arbustes &#x1F333;.";
            $produits = $articlesArbustes;
            break;
        case 'plantesf':
            $addtitle = "Nos plantes fleuries &#x1F33A;.";
            $produits = $articlesPlantesFleuries;
            break;
        case 'plantesI':
            $addtitle = "Nos plantes d'intérieur &#x1F335;";
            $produits = $articlesPlantesInterieur;
            break;
        default:
            $addtitle = "Catégorie inconnue.";
            break;
    }
} else {
    $addtitle = "Nos produits.";
    $produits = array_merge(array_merge($articlesArbustes,$articlesPlantesFleuries),$articlesPlantesInterieur);
}
$title .= $addtitle;
include($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');
?>
<div id="page">
    <div class="sideBlock1">
        <div id="mySidepanel" class="myownsidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <div class="Filtres">
                <h2>Filtres :</h2>
                <div class="filtreSubItem">
                    <div class="nomitem">Stocks</div>
                    <label onlick="changeVisibility()" class="switch">
                        <input id="stocksCheckbox" onclick='changeVisibility()' type="checkbox">
                        <span class="btnSlide round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class='fondsidepanel'>
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>
    <div id="centerPanel">
        <?php
        if (isset($produits)) {
            $index = 0;
            foreach ($produits as $key => $item) {
                if ($index == 0) {
                    echo '<section class="products">';
                }
                $index++;
                echo '<div class="product-card">
                        <a href="/fichesproduits/article.php?id='. $key .' ">
                        <div class="product-image">
                            <img src="'. $item['img']. '">
                        </div>
                        <div class="product-info">
                            <p> ' . $item['nomscien'] . '</p>
                            <p>'. $item['prix'].'</p>
                            <p class="stock">Stock : '. $item['stock'] .'</p>
                        </div>
                    </a>
                </div>';
                if ($index == 3) {
                    echo '</section>';
                    $index = 0;
                }
            }
            if ($index != 0) {
                echo '</section>';
            }
        } else {
            echo "<div> Oops, cette catégorie n'existe pas !</div>";
        }
        ?>
    </div>
</div>
<script src="/js/listesproduits.js"></script>
<?php
include($_SERVER['DOCUMENT_ROOT'] . 'includes/footer.php');
?>