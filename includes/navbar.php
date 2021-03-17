<nav class="menu">
        <ul>
            <li><a class="<?php if($active === "index") {
                echo "active";
            } ?>" href="/index.php">Accueil</a></li>
            <li class="mydropdown"><a class="mydropdownbtn <?php if($active === "produits") {
                echo "active";
            } ?>" href="/listesproduits/listeproduits.html">Nos Produits</a>
                <div class="mydropdown-content">
                    <a href="/listesproduits/arbustes.html">Arbustes &#x1F333;</a>
                    <a href="/listesproduits/plantesfleuries.html">Plantes fleuries &#x1F33A;</a>
                    <a href="/listesproduits/plantesinterieur.html">Plantes d'intérieur &#x1F335;</a>
                </div>
            </li>
            <li><a class="<?php if($active === "compte") {
                echo "active";
            } ?>" href="/login/login.html">Mon Compte</a></li>
            <li><a class="<?php if($active === "contact") {
                echo "active";
            } ?>" href="/contact/contact.html">Contact</a></li>
            <li id="panier"><a href="/panier/panier.html">Panier</a></li>
            <li class="formulaireee">
                <form action="" method="get"><input class="searchbar" name="recherche" type="text" value="" onkeyup=""
                        placeholder="(Recherche.....)" />
                    <div id="resultats"></div>
                </form>
            </li>
        </ul>
    </nav>