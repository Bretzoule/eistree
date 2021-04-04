<?php
$active = "register";
$title = "EISTree - Créer un compte.";
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php');
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>M'enregistrer &#127811;</b></p>
        <div id="fullPanel">
            <div class="inputPanel">
                <form accept-charset="UTF-8" action="" method="post">
                    <p class="petitTitreSection">Mes informations personnelles :</p>
                    <input name="nom" type="text" value="" placeholder="Nom" required /><br>

                    <input name="prenom" type="text" value="" placeholder="Prénom" required /><br>

                    <input name="adresse" type="text" value="" placeholder="Adresse Postale" required /><br>

                    <input name="codepostal" type="text" pattern="[^\s\x3B]+" value="" placeholder="Code Postal" required /><br>

                    <input name="" type="text" value="" placeholder="Ville" required /><br>
            </div>
            <div class="inputPanelFinal">
                <p class="petitTitreSection">Mes informations de connexion :</p>
                <input name="pseudo" type="text" pattern="[^\s\x3B]+" value="" placeholder="Email" oninvalid='setCustomValidity("Champ obligatoire - Merci de ne pas utiliser \"espace\"")' oninput="setCustomValidity('')" required />
                <input name="password" type="password" pattern="[^\s\x3B]+" value="" placeholder="Mot de passe" oninvalid='setCustomValidity("Champ obligatoire - Merci de ne pas utiliser \"espace\"")' oninput="setCustomValidity('')" required />
                <input name="confirmpassword" type="password" pattern="[^\s\x3B]+" value="" placeholder="Confirmez le mot de passe" oninvalid='setCustomValidity("Champ obligatoire - Merci de ne pas utiliser \"espace\"")' oninput="setCustomValidity('')" required /><br>
                <input type="submit" value="Créer !"></input>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
?>