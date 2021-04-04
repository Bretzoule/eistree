<?php
$title = "EISTree - Contact.";
$active = "contact";
include($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');
?>
<?php
$_SESSION['datecontact'] = $_SESSION['nom'] = $_SESSION['prenom'] = $_SESSION['naissance'] = $_SESSION['email'] = $_SESSION['genre'] = $_SESSION['fonction'] = $_SESSION['sujet'] = $_SESSION['contenu'] = "";
$messagedate = $messagenom = $messageprenom = $messagenaissance = $messageemail = $messageemailvalide = $messagefonction = $messagesujet = $messagecontenu = $messagegenre = "";
$booldate = $boolnom = $boolprenom = $boolnaissance = $boolemail = $boolemailvalide = $boolfonction = $boolsujet = $boolcontenu = $boolgenre = true;
?>
<?php

function verif($text)
{
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
}

$_SESSION['datecontact'] = (isset($_POST["datecontact"])) ? verif($_POST["datecontact"]) : "";
$_SESSION['nom'] = $_POST["nom"] = (isset($_POST["nom"])) ? verif($_POST["nom"]) : "";;
$_SESSION['prenom'] = $_POST["prenom"] = (isset($_POST["prenom"])) ? verif($_POST["prenom"]) : "";;
$_SESSION['email'] = $_POST["email"] = (isset($_POST["email"])) ? verif($_POST["email"]) : "";;
$_SESSION['genre'] = $_POST["genre"] = (isset($_POST["genre"])) ? verif($_POST["genre"]) : "";;
$_SESSION['naissance'] = $_POST["naissance"] = (isset($_POST["naissance"])) ? verif($_POST["naissance"]) : "";;
$_SESSION['fonction'] = $_POST["fonction"] = (isset($_POST["fonction"])) ? verif($_POST["fonction"]) : "";;
$_SESSION['sujet'] = $_POST["sujet"] = (isset($_POST["sujet"])) ? verif($_POST["sujet"]) : "";;
$_SESSION['contenu'] = $_POST["contenu"] = (isset($_POST["contenu"])) ? verif($_POST["contenu"]) : "";;
$destinataire = 'contact@eistree.eu';
$envoyeur = 'From: ' . $_SESSION["email"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_SESSION["datecontact"])) {
        $messagedate = 'Veuillez entrer la date de contact';
        $booldate = false;
    }
    if (empty($_SESSION["nom"]) || preg_match("/[^a-zA-Z 'éàôöùêîïèç\-]+/", $_SESSION["nom"])) {
        $messagenom = 'Veuillez saisir un nom valide';
        $boolnom = false;
    }
    if (empty($_SESSION["prenom"]) || preg_match("/[^a-zA-Z 'éàôöùêîïèç\-]+/", $_SESSION["prenom"])) {
        $messageprenom = 'Veuillez saisir un prénom valide';
        $boolprenom = false;
    }
    if (empty($_SESSION["email"])) {
        $messageemail = 'Veuillez saisir un email';
        $boolemail = false;
    }
    if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $_SESSION["email"])) {
        $messageemailvalide = 'Veuillez saisir un email valide (nom@exemple.com)';
        $boolemailvalide = false;
    }
    if (empty($_SESSION["genre"]) || (($_SESSION["genre"] != "plante") && ($_SESSION["genre"] != "homme") && ($_SESSION["genre"] != "femme"))) {
        $messagegenre = 'Veuillez sélectionner un genre';
        $boolgenre = false;
    }
    if (empty($_SESSION["naissance"])) {
        $messagenaissance = 'Veuillez entrer votre date de naissance';
        $boolnaissance = false;
    }
    if (empty($_SESSION["fonction"]) || ($_SESSION["fonction"] != "enseignant" && $_SESSION["fonction"] != "jardinier" && $_SESSION["fonction"] != "cadre" && $_SESSION["fonction"] != "autre")) {
        $messagefonction = 'Veuillez sélectionner votre fonction';
        $boolfonction = false;
    }
    if (empty($_SESSION["sujet"])) {
        $messagesujet = 'Veuillez saisir le sujet de votre mail';
        $boolsujet = false;
    }
    if (empty($_SESSION["contenu"])) {
        $messagecontenu = 'Veuillez saisir le contenu de votre mail';
        $boolcontenu = false;
    }
    if ($booldate && $boolnom && $boolprenom && $boolemail && $boolemailvalide && $boolnaissance && $boolfonction && $boolsujet && $boolcontenu) {
        mail($destinataire, $_SESSION["sujet"], $_SESSION["contenu"], $envoyeur);
    }
}
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>Nous contacter &#127811;</b></p>
        <div id="bloc_contact">
            <form id="formulaireContact" accept-charset="UTF-8" method="POST" action="/contact/contact.php">
                <div class="contactPart">
                    <p>
                        <label for="datecontact">Date du contact</label> <br>
                        <input type="date" id="datecontact" name="datecontact" value='<?php echo $_SESSION["datecontact"] ?>' min="01/01/2021" max="01/01/2022" required />
                    </p>
                    <span id='datecontactManquante'><?php echo $messagedate ?></span>
                    <p>
                        <label for="nom">Nom</label><br>
                        <input placeholder="Entrez votre nom" type="text" id="nom" name="nom" value='<?php echo $_SESSION["nom"] ?>' required />
                    </p>
                    <span id='nomManquant'><?php echo $messagenom ?></span>
                    <p>
                        <label for="prenom">Prénom</label> <br>
                        <input placeholder="Entrez votre prénom" type="text" id="prenom" name="prenom" value='<?php echo $_SESSION["prenom"] ?>' required />
                    </p>
                    <span id='prenomManquant'><?php echo $messageprenom ?></span>
                    <p>
                        <label for="email">Email</label> <br>
                        <input placeholder="monmail@monsite.org" type="text" id="email" name="email" value='<?php echo $_SESSION["email"] ?>' required />
                    </p>
                    <span id='emailManquant'><?php if(!empty($messageemail)){echo $messageemail;} elseif(!empty($messageemailvalide)){echo $messageemailvalide;}?></span>
                    <p id="genre">
                        <label>Genre</label> <br>
                        <input type="radio" name="genre" value="femme" id="genref" required <?php if((isset($_SESSION["genre"]) && $_SESSION["genre"] === "femme") || empty($_SESSION["genre"])){echo 'checked="true"';} ?> required />
                        <label for="genref">Femme</label>
                        <input type="radio" name="genre" value="homme" id="genreh" <?php if(isset($_SESSION["genre"]) && $_SESSION["genre"] === "homme"){echo 'checked="true"';} ?> required />
                        <label for="genreh">Homme</label>
                        <input type="radio" name="genre" value="plante" id="genrep" <?php if(isset($_SESSION["genre"]) && $_SESSION["genre"] === "plante"){echo 'checked="true"';} ?> required />
                        <label for="genrep">Plante</label>
                        <span id='genreManquant'><?php echo $messagegenre ?></span><br>
                    </p>
                    <p>
                        <label for="naissance">Date de naissance</label><br>
                        <input type="date" id="naissance" name="naissance" value='<?php echo $_SESSION["naissance"] ?>' required />
                    </p>
                    <span id='naissanceManquante'><?php echo $messagenaissance ?></span>
                    <p>
                        <label for="fonction">Fonction</label> <br>
                        <select name="fonction" id="fonction" required>
                            <option <?php if(isset($_SESSION["fonction"]) && $_SESSION["fonction"] === "enseignant"){echo 'selected="true"';} ?> value="enseignant">Enseignant</option>
                            <option <?php if(isset($_SESSION["fonction"]) && $_SESSION["fonction"] === "cadre"){echo 'selected="true"';} ?> value="cadre">Cadre</option>
                            <option <?php if(isset($_SESSION["fonction"]) && $_SESSION["fonction"] === "jardinier"){echo 'selected="true"';} ?> value="jardinier">Jardinier</option>
                            <option <?php if(isset($_SESSION["fonction"]) && $_SESSION["fonction"] === "autre"){echo 'selected="true"';} ?> value="autre">Autre</option>
                        </select>
                    </p>
                    <span id='fonctionManquante'><?php echo $messagefonction ?></span>
                </div>
                <div class="contactPart">
                    <p>
                        <label>Objet</label> <br>
                        <input placeholder="Entrez le sujet de votre mail" type="text" id="sujet" name="sujet" value='<?php echo $_SESSION["sujet"] ?>' required />
                    </p>
                    <span id="sujetManquant"><?php echo $messagesujet ?></span>
                    <p>

                        <textarea name="contenu" cols="30" rows="20" id="contenu" placeholder="Tapez ici votre mail" required><?php echo $_SESSION["contenu"] ?></textarea>
                    </p>
                    <span id='contenuManquant'><?php echo $messagecontenu ?></span>
                    <p>
                        <input id="specialSubmit" type="submit" value="Envoyer !" />
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="/js/contact.js"></script> -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . 'includes/footer.php');
?>