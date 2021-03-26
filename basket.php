<?php include 'config/template/head.php'; ?>
<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
        
    </header>
    <main>
        <section class="main-wrapper">
            <nav class="breadcrumb">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><span aria-current="page">Panier</span></li>
                </ul>
            </nav>
            <h2>Votre Panier</h2>
            <div class="basket-wrapper">
                <div class="basket-container" id="basket-container-one">
                <img class="basket-picture" srcset="asset/img/psg-saison-1975/devant/psg-1975-devant-100x120.webp 100w,
                                asset/img/psg-saison-1975/devant/psg-1975-devant-250x300.webp 250w" 
                        sizes="(max-width: 767px) 100px, 250px" 
                        src="asset/img/psg-saison-1975/devant/psg-1975-devant-250x300.webp" alt="Maillot PSG extérieur 1975/76 devant">
                    <div class="basket-info-container">
                        <span class="product-title-basket">PSG 1975/76 - Extérieur</span>
                        <span class="product-size-basket">Size - XL</span>
                    </div>
                    <span class="basket-product-quantity">1</span>
                    <span class="basket-product-price">75€</span>
                    <button class="basket-button" id="delete-product-basket" type="submit" name="annuler">X</button>
                </div>
            </div>
            <button class="add-to-cart basket-payment-button">ACHETER</button>
        </section>
    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer>
    <script src="asset/script/script-pageBasket.js"></script>
</body>
</html>