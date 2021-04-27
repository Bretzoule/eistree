function createBanner(alert, pretext, text) {
    banner = document.createElement('div');
    banner.setAttribute('onload', 'autoremove(this)');
    banner.setAttribute('class', 'alert ' + alert + ' float alert-dismissible position-absolute myAlert');
    banner.innerHTML = '<strong>' + pretext + '</strong> ' + text + ' <a href="#" class="closebtn" data-dismiss="alert">×</a>';
    return (banner);
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

document.querySelector(".searchbar").addEventListener('focus', () => {
    element = document.querySelector(".mydropdown-resultats-content");
    if (element.innerHTML != "") {
        element.style.display = "block";
    }
});

document.querySelector(".searchbar").addEventListener('blur', () => {
    sleep(100).then(() => {
        document.querySelector(".mydropdown-resultats-content").style.display = "none";
    });
});

function showResult(str) {
    blocresultat = document.querySelector(".mydropdown-resultats-content");
    if (str.length == 0) {
        blocresultat.innerHTML = "";
        blocresultat.style.display = "none";
        return;
    }
    var xmlhttp = new XMLHttpRequest(); // création de la requete
    xmlhttp.onreadystatechange = function () {
        let myData;
        if (this.readyState == 4 && this.status == 200) {
            try {
                myData = JSON.parse(this.responseText);
            } catch (e) {
                console.error("Erreur de parsing:", e);
                myalert = 'alert-warning';
                pretext = 'Erreur !';
                text = 'Erreur API, merci de contacter l\'administrateur';
                myHeader = document.getElementById("mainheader");
                myHeader.insertAdjacentElement('afterbegin', createBanner($alert, $pretext, $text));
                setTimeout(r => document.getElementsByClassName("alert-dismissible")[0].remove(), 3000);
            }
            let searchResult;

            blocresultat.innerHTML = "";
            myData.forEach(item => {
                searchResult = document.createElement('a');
                searchResult.innerText = item[0];
                (item[1] != "") ? (searchResult.setAttribute("href", "/fichesproduits/article.php?id=" + item[1])) : (searchResult.setAttribute("href", "#"));
                blocresultat.appendChild(searchResult);
            });
            blocresultat.style.display = "block";
        }
    }
    xmlhttp.open("GET", "/listesproduits/recherche.php?recherche=" + str, true); // on ouvre la requete
    xmlhttp.send();
}