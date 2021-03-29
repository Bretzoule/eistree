<nav class="menu">
    <ul>
        <li><a class="<?php if ($active === "index") {
                            echo "active";
                        } ?>" href="/index.php">Accueil</a></li>
        <li class="mydropdown"><a class="mydropdownbtn <?php if ($active === "produits") {
                                                            echo "active";
                                                        } ?>" href="/listesproduits/produits.php">Nos Produits</a>
            <div class="mydropdown-content">
                <a href="/listesproduits/produits.php?cat=arbustes">Arbustes &#x1F333;</a>
                <a href="/listesproduits/produits.php?cat=plantesf">Plantes fleuries &#x1F33A;</a>
                <a href="/listesproduits/produits.php?cat=plantesI">Plantes d'intérieur &#x1F335;</a>
            </div>
        </li>
        <li><a class="<?php if (in_array($active, array('compte', 'register', 'login'))) {
                            echo "active";
                        } ?>" href="/login/login.php">Mon Compte</a></li>
        <li><a class="<?php if ($active === "contact") {
                            echo "active";
                        } ?>" href="/contact/contact.php">Contact</a></li>
        <li id="panier"><a href="/panier/panier.php">Panier</a></li>
        <li class="formulaireee">
            <form action="" method="get"><input class="searchbar" name="recherche" type="text" value="" onkeyup="" placeholder="(Recherche.....)" />
                <div id="resultats"></div>
            </form>
        </li>
    </ul>
</nav>