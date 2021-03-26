"use strict";


/* ------------------- profil_admin : minus/plus boutton ------------------- */


let btnQuantityPlus = document.getElementById("admin-button-quantity-plus");
let btnQuantityMinus = document.getElementById("admin-button-quantity-minus");
let btnPricePlus = document.getElementById("admin-button-price-plus");
let btnPriceMinus = document.getElementById("admin-button-price-minus");
let fieldPrice = document.getElementById("product-price");
let fieldQuantity = document.getElementById("product-quantity");
var countQuantity = fieldQuantity.value;
var countPrice = fieldPrice.value;

btnQuantityPlus.addEventListener('click', () => {
    countQuantity++;
    fieldQuantity.value = countQuantity;
});

btnQuantityMinus.addEventListener('click', () => {
    if (countQuantity > 1) {
        countQuantity--;
        fieldQuantity.value = countQuantity;
    }
});

btnPricePlus.addEventListener('click', () => {
    countPrice++;
    fieldPrice.value = countPrice;
});

btnPriceMinus.addEventListener('click', () => {
    if (countPrice > 1) {
        countPrice--;
        fieldPrice.value = countPrice;
    }
});