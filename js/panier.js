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

