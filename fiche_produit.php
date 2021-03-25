<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
    <main>
        <section class="main-wrapper">
            <h2>AS ROMA 2012/2013 - DOMICILE</h2>
            <div class="product-container">
                <div class="product-big-picture">
                    <img src="asset/img/ronaldinho.webp" alt="Image produit">
                </div>
                <div class="product-more-container">
                    <img class="product-more-picture" src="asset/img/ronaldinho.webp" alt="Image produit">
                    <img class="product-more-picture" src="asset/img/ronaldinho.webp" alt="Image produit">
                    <img class="product-more-picture" src="asset/img/ronaldinho.webp" alt="Image produit">
                </div>
                <section class="product-infos-container">
                    <label for="product-size">Taille</label><br>
                    <select name="product-size" class="product-size" id="product-size">
                        <option value="">Choisir une taille</option>
                        <option value="1">Small</option>
                        <option value="2">Medium</option>
                        <option value="3">Large</option>
                    </select>
                    <h3 class="product-price">90 €</h3>
                    <input class="add-to-cart" type="submit" value="Ajouter au panier">
                    <div class="product-payment">
                        <img class="payment-pictures" src="asset/img/paypal.svg" alt="Paiement paypal">
                        <img class="payment-pictures" src="asset/img/mastercard.svg" alt="Paiement mastercard">
                        <img class="payment-pictures" src="asset/img/americanexpress.svg" alt="Paiement american express">
                        <img class="payment-pictures" src="asset/img/visa-logo.svg" alt="Paiement visa">
                    </div>
                    <ul class="production-description-container">
                        <li class="product-description">
                            <p class="product-stock">Il reste 14 produits en stock</p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">Équipe : </p>
                            <p>As Roma</p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">Saison : </p>
                            <p>2012/2013</p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">Marque : </p>
                            <p>Kappa</p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">État : </p>
                            <p>Neuf (voir photos)</p>
                        </li>
                    </ul>
                </section>
            </div>
        </section>
    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer> 
</body>
</html>