<?php
$active = "login";
$title = "EISTree - Reset PW";
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php');
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

$_SESSION['passwordo'] =  $_SESSION['passwordobis'] = $_SESSION['email'] = "";
$messagepasswordo = $messagepasswordobis = $messageemailvalide = "";
$boolpassword = $boolpasswordbis = $boolemail = true;

$_SESSION['email'] = (isset($_POST["email"])) ? verif($_POST["email"]) : "";
$_SESSION['passwordo'] = (isset($_POST["password"])) ? verif($_POST["password"]) : "";
$_SESSION['passwordobis'] = (isset($_POST["confirmpassword"])) ? verif($_POST["confirmpassword"]) : "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    if ($boolpassword && $boolpasswordbis && $boolemail) {
        $_SESSION["dataPassed"] = true; 
      header('Location: /login/confirmResetPW.php');
    }
}


?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>Réinitialiser le Mot de Passe &#127811;</b></p>
        <div id="bloc_Login">
            <form accept-charset="UTF-8" action="/login/forgotPw.php" method="post">
                <input name="email" type="text"  value="<?php echo $_SESSION['email']; ?>" placeholder="Email" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required /><br>
                <span class="couleurRouge" id='mailManquant'><?php echo $messageemailvalide; ?></span> <br>
                <input name="password" type="password" value="" placeholder="Mot de passe" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required /><br>
                <span class="couleurRouge" id='pwManquant'><?php echo $messagepasswordo; ?></span><br>
                <input name="confirmpassword" type="password" value="" placeholder="Confirmer mot de passe" oninvalid='setCustomValidity("Champ obligatoire")' oninput="setCustomValidity('')" required /><br>
                <span class="couleurRouge" id='pwBisManquant'><?php echo $messagepasswordobis; ?></span> <br>
                <input type="submit" value="Modifier !"></input>
            </form>
        </div>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
