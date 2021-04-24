<?php
$active = "produits";
$title = "EISTree - ";

require($_SERVER['DOCUMENT_ROOT'] . "/db/categoryQuery.php");
$connexion = connectDB();
if (isset($_GET['cat'])) {
    $catID = htmlspecialchars($_GET['cat']);
    switch ($catID) {
        case 'arbustes':
            $addtitle = "Nos arbustes &#x1F333;.";
            break;
        case 'plantesf':
            $addtitle = "Nos plantes fleuries &#x1F33A;.";
            break;
        case 'plantesI':
            $addtitle = "Nos plantes d'intérieur &#x1F335;";
            break;
        default:
            $addtitle = "Catégorie inconnue.";
            break;
    }
    $data = getCategory($connexion, $catID);
} else {
    $addtitle = "Nos produits.";
    $data = queryAll($connexion);
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
        if (isset($data) and !empty($data)) {
            $index = 0;
            foreach ($data as $item) {
                if ($index == 0) {
                    echo '<section class="products">';
                }
                $index++;
                echo '<div class="product-card">
                        <a href="/fichesproduits/article.php?id='. $item['id'] .' ">
                        <div class="product-image">
                            <img src="'. $item['img']. '">
                        </div>
                        <div class="product-info">
                            <p> ' . $item['nomscien'] . '</p>
                            <p>'. $item['prix'].'€</p>
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
            echo "<div> Oops, cette catégorie n'existe pas, ou aucun article n'est disponible !</div>";
        }
        ?>
    </div>
</div>
<script src="/js/listesproduits.js"></script>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>