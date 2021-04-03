<?php
$active = "login";
$title = "EISTree - Connexion";
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'includes/navbar.php');
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>Mon compte &#127811;</b></p>
        <div id="bloc_Login">
            <form accept-charset="UTF-8" action="/login/verifLogin.php" method="post">
                <input name="email" type="text" pattern="[^\s\x3B]+" value="" placeholder="Email" oninvalid='setCustomValidity("Champ obligatoire - Merci de ne pas utiliser \"espace\" et ; ")' oninput="setCustomValidity('')" required /><br>
                <input name="password" type="password" pattern="[^\s\x3B]+" value="" placeholder="Mot de passe" oninvalid='setCustomValidity("Champ obligatoire - Merci de ne pas utiliser \"espace\" et ; ")' oninput="setCustomValidity('')" required /><br>
                <input type="submit" value="Se connecter"></input> <br>
                <a href="/register/register.php"><input type="button" value="S'inscrire"></input></a>
            </form>
        </div>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
