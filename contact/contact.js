const verifNomPrenom = /^[a-z,.'-]+$/i;
const verifMail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]{2,}$/;

window.onload = function() {
    document.getElementById('datecontact').value = new Date().toISOString().slice(0, 10);
}

document.getElementById('specialSubmit').addEventListener('click', (event) => {
    datecontactManquante.textContent = "";
    if (!datecontact.checkValidity()) {
        datecontactManquante.textContent = 'Sélectionner la date de contact';
        datecontactManquante.style.color = "red";
        event.preventDefault();
    }
    nomManquant.textContent = "";
    if (!nom.checkValidity()) {
        nomManquant.textContent = 'Entrez un nom';
        nomManquant.style.color = "red";
        event.preventDefault();
    } else if (!verifNomPrenom.test(nom.value)) {
        nomManquant.textContent = 'Format incorrect... seul l\'alphabet et les "-" sont autorisés';
        nomManquant.style.color = "red";
        event.preventDefault();
    }
    prenomManquant.textContent = "";
    if (!prenom.checkValidity()) {
        prenomManquant.textContent = 'Entrez un prénom';
        prenomManquant.style.color = "red";
        event.preventDefault();
    } else if (!verifNomPrenom.test(prenom.value)) {
        prenomManquant.textContent = 'Format incorrect... seul l\'alphabet et les "-" sont autorisés';
        prenomManquant.style.color = "red";
        event.preventDefault();
    }
    emailManquant.textContent = "";
    if (email.value == "") {
        emailManquant.textContent = 'Entrez un email';
        emailManquant.style.color = "red";
        event.preventDefault();
    } else if (!verifMail.test(email.value)) {
        console.log(non)
        emailManquant.textContent = 'Format incorrect... mail@example.test';
        emailManquant.style.color = "red";
        event.preventDefault();
    }
    naissanceManquante.textContent = "";
    if (!naissance.checkValidity()) {
        naissanceManquante.textContent = 'Sélectionner votre date de naissance';
        naissanceManquante.style.color = "red";
        event.preventDefault();
    }
    fonctionManquante.textContent = "";
    if (!fonction.checkValidity()) {
        fonctionManquante.textContent = 'Sélectionner votre fonction';
        fonctionManquante.style.color = "red";
        event.preventDefault();
    }
    sujetManquant.textContent = "";
    if(!sujet.checkValidity()) {
        sujetManquant.textContent = 'Entrez le objet de votre message';
        sujetManquant.style.color = "red";
        event.preventDefault();
    }
    contenuManquant.textContent = "";
    if(!contenu.checkValidity()) {
        contenuManquant.textContent = 'Entrez un contenu';
        contenuManquant.style.color = "red";
        event.preventDefault();
    }
});
