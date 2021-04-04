<?php
$title ="EISTree - Contact.";
$active = "contact";
include($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');
?>
    <div id="page">
        <div id="centerPanel">
            <p id="mainTitle"><b>Nous contacter &#127811;</b></p>
            <div id="bloc_contact">
                <form id="formulaireContact" accept-charset="UTF-8">
                    <?php echo $message ?>
                    <div class="contactPart">
                        <p>
                            <label for="datecontact">Date du contact</label> <br>
                            <input type="date" id="datecontact" name="datecontact" value="jj/mm/aaaa" min="01/01/2021"
                                max="01/01/2022" required />
                        </p>
                        <span id='datecontactManquante'></span>
                        <p>
                            <label for="nom">Nom</label><br>
                            <input placeholder="Entrez votre nom" type="text" id="nom" name="nom" required />
                        </p>
                        <span id='nomManquant'></span>
                        <p>
                            <label for="prenom">Prénom</label> <br>
                            <input placeholder="Entrez votre prénom" type="text" id="prenom" name="prenom" required />
                        </p>
                        <span id='prenomManquant'></span>
                        <p>
                            <label for="email">Email</label> <br>
                            <input placeholder="monmail@monsite.org" type="email" id="email" name="email" required />
                        </p>
                        <span id='emailManquant'></span>
                        <p id="blocGenre">
                            <label>Genre</label> <br>
                            <input type="radio" name="sexe" value="femme" id="genref" required checked />
                            <label for="genref">Femme</label>
                            <input type="radio" name="sexe" value="homme" id="genreh" required />
                            <label for="genreh">Homme</label>
                            <input type="radio" name="sexe" value="plante" id="genrep" required />
                            <label for="genrep">Plante</label>
                            <span id='genreManquant'></span><br>
                        </p>
                        <p>
                            <label for="naissance">Date de naissance</label><br>
                            <input type="date" id="naissance" name="naissance" value="jj/mm/aaaa" required />
                        </p>
                        <span id='naissanceManquante'></span>
                        <p>
                            <label for="fonction">Fonction</label> <br>
                            <select name="fonction" id="fonction" required>
                                <option value="enseignant">Enseignant</option>
                                <option value="cadre">Cadre</option>
                                <option value="Jardinier">Jardinier</option>
                                <option value="autre">Autre</option>
                            </select>
                        </p>
                        <span id='fonctionManquante'></span>
                    </div>
                    <div class="contactPart">
                        <p>
                            <label>Objet</label> <br>
                            <input placeholder="Entrez le sujet de votre mail" type="text" id="sujet" name="sujet"
                                required />
                        </p>
                        <span id="sujetManquant"></span>
                        <p>

                            <textarea name="contenu" cols="30" rows="20" id="contenu" placeholder="Tapez ici votre mail"
                                required></textarea>
                        </p>
                        <span id='contenuManquant'></span>
                        <p>
                            <input id="specialSubmit" type="submit" value="Envoyer !" />
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/contact.js"></script>

    <?php
    @$datecontact=$_POST["datecontact"];
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$email=$_POST["email"];
    @$blocGenre=$_POST["blocGenre"];
    @$naissance=$_POST["naissance"];
    @$fonction=$_POST["fonction"];
    @$sujet=$_POST["sujet"];
    @$contenu=$_POST["contenu"];
    @$specialSubmit=$_POST["specialSubmit"];
    $destinataire = 'contact@eistree.eu';
    $envoyeur = 'From: ' . $email;

    if(isset($specialSubmit)){
        if(empty($datecontact))
        $message='<div class="erreur">Veuillez entrer la date de contact</div>';
        elseif(empty($nom) && preg_match("^[A-Za-z '-]+$",$nom))
        $message='<div class="erreur">Veuillez saisir un nom valide</div>';
        elseif(empty($prenom) && preg_match("^[A-Za-z '-]+$",$prenom))
        $message='<div class="erreur">Veuillez saisir votre prénom valide</div>';
        elseif(empty($email) && preg_match("^#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$prenom))
        $message='<div class="erreur">Veuillez saisir votre email</div>';
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        
        $message='<div class="erreur">Veuillez saisir un email valide (nom@exemple.com)</div>';
        // ajouter vérification blocGenre
        elseif($naissance!=$naissance)
        $message='<div class="erreur">Veuillez entrer votre date de naissance</div>';
        elseif(empty($fonction))
        $message='<div class="erreur">Veuillez sélectionner votre fonction</div>';
        elseif(empty($sujet))
        $message='<div class="erreur">Veuillez saisir le sujet de votre mail</div>';
        elseif(empty($contenu))
        $message='<div class="erreur">Veuillez saisir le contenu de votre mail</div>';
        else
        mail($destinataire, $sujet, $contenu, $envoyeur);
    }
?>

 <?php 
 include($_SERVER['DOCUMENT_ROOT'] . 'includes/footer.php');
 ?>