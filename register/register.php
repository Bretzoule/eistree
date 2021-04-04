<?php

$active = "register";
$title = "EISTree - Créer un compte.";
include($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');

if (isset($_SESSION['user'])) {
    $_SESSION['errorThrow'] = 'alreadyloggedin';
    header('Location: /index.php');
    exit();
}

function verif($text)
{
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
}

$_SESSION['nom'] = $_SESSION['prenom'] = $_SESSION['passwordo'] =  $_SESSION['passwordobis'] = $_SESSION['email'] = "";
$messagepasswordo = $messagepasswordobis  = $messagenom = $messageprenom = $messageemailvalide = "";
$boolpassword = $boolnom = $boolprenom = $boolpasswordbis = $boolemail = true;


$_SESSION['nom'] = (isset($_POST["nom"])) ? verif($_POST["nom"]) : "";
$_SESSION['prenom'] = (isset($_POST["prenom"])) ? verif($_POST["prenom"]) : "";
$_SESSION['email']  = (isset($_POST["email"])) ? verif($_POST["email"]) : "";
$_SESSION['passwordo'] = (isset($_POST["password"])) ? verif($_POST["password"]) : "";
$_SESSION['passwordobis'] = (isset($_POST["confirmpassword"])) ? verif($_POST["confirmpassword"]) : "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_SESSION["nom"]) || preg_match("/[^a-zA-Z 'éàôöùêîïèç\-]+/", $_SESSION["nom"])) {
        $messagenom = 'Veuillez saisir un nom valide';
        $boolnom = false;
    }
    if (empty($_SESSION["prenom"]) || preg_match("/[^a-zA-Z 'éàôöùêîïèç\-]+/", $_SESSION["prenom"])) {
        $messageprenom = 'Veuillez saisir un prénom valide';
        $boolprenom = false;
    }
    if (empty($_SESSION["email"]) || !preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $_SESSION["email"])) {
        $messageemailvalide = 'Veuillez saisir un email valide (nom@exemple.com)';
        $boolemailvalide = false;
    }
    if (empty($_SESSION["passwordo"])) {
        $messagepasswordo = 'Veuillez rentrer un mot de passe valide.';
        $boolpassword = false;
    }
    if (empty($_SESSION['passwordobis']) || ($_SESSION['passwordobis'] !== $_SESSION["passwordo"])) {
        $messagepasswordobis = 'Les mot de passe ne correspondent pas.';
        $boolpasswordbis = false;
    }
    if ($boolpassword && $boolnom && $boolprenom && $boolpasswordbis && $boolemail) {
        $_SESSION["dataPassed"] = true; 
      header('Location: /register/confirmRegistration.php');
    }
}

?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>M'enregistrer &#127811;</b></p>
        <div id="fullPanel">
            <div class="inputPanel">
                <form accept-charset="UTF-8" action="/register/register.php" method="post">
                    <p class="petitTitreSection">Mes informations personnelles :</p>
                    <input name="nom" type="text" value="<?php echo $_SESSION['nom']; ?>" placeholder="Nom" required /><br>
                    <span class="couleurRouge" id='nomManquant'><?php echo $messagenom; ?></span>
                    <input name="prenom" type="text" value="<?php echo $_SESSION['prenom']; ?>" placeholder="Prénom" required /><br>
                    <span class="couleurRouge" id='prenomManquant'><?php echo $messageprenom; ?></span>
            </div>
            <div class="inputPanelFinal">
                <p class="petitTitreSection">Mes informations de connexion :</p>
                <input name="email" type="text" value="<?php echo $_SESSION['email']; ?>" placeholder="Email" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required />
                <span class="couleurRouge" id='mailManquant'><?php echo $messageemailvalide; ?></span>
                <input name="password" type="password" value="" placeholder="Mot de passe" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required />
                <span class="couleurRouge" id='mdpManquant'><?php echo $messagepasswordo; ?></span>
                <input name="confirmpassword" type="password" value="" placeholder="Confirmez le mot de passe" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required /><br>
                <span class="couleurRouge" id='mdpBisManquant'><?php echo $messagepasswordobis; ?></span>
                <input type="submit" value="Créer !"></input>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>