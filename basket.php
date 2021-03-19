<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
    <main>
        <section class="main-wrapper">
            <section class="basket-wrapper">
                <div class="basket-container">
                    <img class="basket-picture" src="asset/img/ronaldinho.webp" alt="Image produit">

                    <div class="basket-info-container">
                        <span class="product-title-basket">AS Roma 2013/14 Domicile</span>
                        <span class="product-size-basket">Size - XL</span>
                    </div>

                    <span class="basket-product-quantity">1</span>

                    <span class="basket-product-price">75€</span>

                    <button class="basket-button" type="submit" name="annuler">X</button>
                </div>
            </section>
        </section>
    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer>
</body>

</html>