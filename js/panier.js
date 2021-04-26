window.onload = updateCart;

function incrementer(element) {
    let valuecount = element.parentNode.parentNode.querySelector('.number').value;
    valuecount++;

    let valuemax = parseInt(element.parentNode.parentNode.querySelector('#stock').innerHTML, 10);
    if (valuecount <= valuemax) {
        if (valuecount == valuemax) {
            element.style.display = "none";
        }
        element.parentNode.parentNode.querySelector('.number').value = valuecount;
        updateCart();
    }
}

function decrementer(element) {
    let valuecount = element.parentNode.parentNode.querySelector('.number').value;
    valuecount--;
    if (valuecount >= 1) {
        if (element.parentNode.parentNode.querySelector('#plus').style.display == "none") {
            element.parentNode.parentNode.querySelector('#plus').style.display = "inherit";
        }
        element.parentNode.parentNode.querySelector('.number').value = valuecount;
        updateCart();
    }
}

function removeElement(element) {
    elementToDelete = element.parentNode.parentNode;
    elementToDelete.parentNode.removeChild(elementToDelete);
    updateCart();
}

function updateCart() {
    let elementList = document.querySelectorAll(".price");
    let totalQuantity = 0;
    let sousTotal = document.querySelector("#subtotal");
    let expedition = document.querySelector("#shipping");
    let taxes = document.querySelector("#taxes");
    let total = document.querySelector("#total");
    let quantity = 0;
    let subElement = new Array();
    for (const item of elementList) {
        quantity = parseInt(item.parentNode.querySelector(".number").value, 10);
        subElement.push(quantity * parseFloat(item.textContent));
        totalQuantity += quantity;
    }
    sousTotal.textContent = (subElement.reduce((a, b) => a + b, 0)).toFixed(2) + "€";
    expedition.textContent = (2.99 * totalQuantity).toFixed(2) + "€";
    taxes.textContent = ((5.0 / 100) * parseFloat(sousTotal.textContent)).toFixed(2) + "€";
    total.textContent = (parseFloat(expedition.textContent) + parseFloat(sousTotal.textContent) + parseFloat(taxes.textContent)).toFixed(2) + "€";
}


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



function commander() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        let myData;
        if (this.readyState == 4 && this.status == 200) {
            try {
                myData = JSON.parse(this.responseText);
                $alert = myData[0];
                $pretext = myData[1];
                $text = myData[2];
            } catch (e) {
                console.error("Erreur de parsing:", e);
                $alert = 'alert-warning';
                $pretext = 'Erreur !';
                $text = 'Erreur API, merci de contacter l\'administrateur';
            }
            myHeader = document.getElementById("mainheader");
            myHeader.insertAdjacentElement('afterbegin', createBanner($alert, $pretext, $text));
            element = document.getElementsByClassName('table')[0].getElementsByTagName('tbody')[0];
            if (element && myData[3] === "valid" ) element.remove();
            setTimeout(r => document.getElementsByClassName("alert-dismissible")[0].remove(), 3000);
            updateCart();
        }
    };
    xhttp.open("GET", "/panier/commander.php", true);
    xhttp.send();
}