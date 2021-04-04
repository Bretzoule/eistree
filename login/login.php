<?php
$active = "login";
$title = "EISTree - Connexion";
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php');
if (isset($_SESSION['user'])) {
    $_SESSION['errorThrow'] = 'alreadyloggedin';
    header('Location: /index.php');
    exit();
}
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>Mon compte &#127811;</b></p>
        <div id="bloc_Login">
            <form accept-charset="UTF-8" action="/login/verifLogin.php" method="post">
                <input name="login" type="text"  value="" placeholder="Email" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required /><br>
                <input name="password" type="password" value="" placeholder="Mot de passe" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required /><br>
                <input type="submit" value="Se connecter"></input> <br>
                <a href="/register/register.php"><input type="button" value="S'inscrire"></input></a> <br>
                <a href="/login/forgotPw.php"><input type="button" value="MDP oublié..."></input></a>
            </form>
        </div>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
