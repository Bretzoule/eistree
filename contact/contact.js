let verifNomPrenom = /^[a-zA-Z][a-zéèêàçîï]+([-'\s][a-zA-Zéèêîïàç]+)?$/;



document.getElementById('specialSubmit').addEventListener('click', () => {
    if (!datecontact.checkValidity()) {
        datecontactManquante.textContent = 'Sélectionner la date de contact';
        datecontactManquante.style.color = "red";
    }
    if (!nom.checkValidity()) {
        nomManquant.textContent = 'Entrez un nom';
        nomManquant.style.color = "red";
    } else if (verifNomPrenom.test(nom.value) == false) {
        nomManquant.textContent = 'Format incorrect';
        nomManquant.style.color = "red";
    }
    if (!prenom.checkValidity()) {
        prenomManquant.textContent = 'Entrez un prénom';
        prenomManquant.style.color = "red";
    } else if (verifNomPrenom.test(prenom.value) == false) {
        prenomManquant.textContent = 'Format incorrect';
        prenomManquant.style.color = "red";
    }
    if (!email.checkValidity()) {
        emailManquant.textContent = 'Entrez un email';
        emailManquant.style.color = "red";
    }
    if (!naissance.checkValidity()) {
        naissanceManquante.textContent = 'Sélectionner votre date de naissance';
        naissanceManquante.style.color = "red";
    }
    if (!fonction.checkValidity()) {
        fonctionManquante.textContent = 'Sélectionner votre fonction';
        fonctionManquante.style.color = "red";
    }
    if(!sujet.checkValidity()) {
        sujetManquant.textContent = 'Entrez le objet de votre message';
        sujetManquant.style.color = "red";
    }
    if(!contenu.checkValidity()) {
        contenuManquant.textContent = 'Entrez un contenu';
        contenuManquant.style.color = "red";
    }
});
