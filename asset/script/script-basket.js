"use strict";

// --------------------------------------------- DECLARATION DES VARIABLES ---------------------------------------------

let actualiseBasket = document.getElementById("actualise-basket");
let quantityProduct = document.querySelectorAll(".quantity-product");
let element;
let idQuantityProduct;

// --------------------------------------------- GESTION DES BOUCLES / FONCTIONS / METHODES ---------------------------------------------

// Cette boucle permet de lancer la fonction php recalc (voir objet basket dans functions.php) 
// a chaque fois que les input quantity ne sont plus focus.

for (let i = 0; i < quantityProduct.length; i++) {
    element = 'element' + (i+1);
    idQuantityProduct = quantityProduct[i].id;
    element = document.getElementById(idQuantityProduct);
    element.addEventListener('focusout', () => {
        actualiseBasket.click();
    });
}


