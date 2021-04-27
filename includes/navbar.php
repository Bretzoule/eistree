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
        <li><a class="<?php if (in_array($active, array('account', 'register', 'login'))) {
                            echo "active";
                        } ?>" <?php if (isset($_SESSION['user'])) {
                                    echo 'href="/account/account.php"> Mon Compte';
                                } else {
                                    echo 'href="/login/login.php"> Se Connecter';
                                } ?> </a></li>
        <li><a class="<?php if ($active === "contact") {
                            echo "active";
                        } ?>" href="/contact/contact.php">Contact</a></li>
        <?php if (isset($_SESSION['user'])) {
            echo '<li id="panier"><a href="/login/logout.php">Déconnexion</a></li>';
        } ?>
        <li id="panier"><a href="/panier/panier.php">Panier</a></li>
        <li class="formulaireee mydropdown-resultats">
            <input class="searchbar" name="recherche" type="text" value="" onclick="(this.value == '') ? showResult(this.value) : ''" onkeyup="showResult(this.value)" placeholder="(Recherche.....)" />
            <div id="resultats" class="mydropdown-resultats-content"></div>
        </li>
    </ul>
</nav>