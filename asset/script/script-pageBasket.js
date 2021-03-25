let btnDeleteProduct = document.getElementById("delete-product-basket");
let containerProduct = document.getElementById("basket-container-one");

btnDeleteProduct.addEventListener('click', () => {
    containerProduct.style.display = "none";
});