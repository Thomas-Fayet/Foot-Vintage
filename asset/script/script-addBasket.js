"use strict";
console.log("Hello World");

let addBasket = document.getElementById("add-basket");
let addConfirmation;

addBasket.addEventListener('click', (event) => {
    event.preventDefault()
});
addBasket.addEventListener('click', () => reqAjax());

function  reqAjax() {
    let req = new XMLHttpRequest();
    
    req.open('GET', addBasket.href)

    // req.responseType = 'json';
    
    req.addEventListener('load', () => {

        if (req.status != 200) {
            console.log("Erreur " + req.status + " : " + req.statusText);
        } else {
            console.log(req.status + " " + req.statusText);
            addConfirmation = JSON.parse(req.responseText);

            if (addConfirmation.error) {
                alert(addConfirmation.message)
            } else {
                console.log(addConfirmation);
                if (confirm(addConfirmation.message + " " + "Consulter le panier ?")) {
                    location.href = 'basket.php'; 
                }
            } 
        }
    });
    req.send();
}