<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
    <main>
        <section class="main-wrapper">
            <h2 class="profil-title">ESPACE D'ADMINISTRATION</h2>
            <ul class="profil-container">
                <li class="product-description admin-panel">
                    <p>Choix du produit à modifier :</p>
                    <select name="admin-product-list" id="admin-product-list">
                        <option value="maillot1">AS Roma 2012/13 Domicile</option>
                        <option value="maillot2">Real Madrid 2012/13 Domicile</option>
                        <option value="maillot3">PSG 2012/13 Domicile</option>
                    </select>
                </li>
                <li class="product-description admin-panel">
                    <p>Quantité :</p>
                    <div class="quantity-price-container">
                        <button class="admin-button">-</button>
                        <input class="admin-input" type="number" name="product-quantity" id="product-quantity">
                        <button class="admin-button">+</button>
                    </div>
                </li>
                <li class="product-description admin-panel">
                    <p>Prix (€) :</p>
                    <div class="quantity-price-container">
                        <button class="admin-button">-</button>
                        <input class="admin-input" type="number" name="product-price" id="product-price">
                        <button class="admin-button">+</button>
                    </div>
                </li>
                <input class="form-submit-button admin-submit" type="submit" value="Modifier" name="envoyer">
            </ul>
        </section>
    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer>
</body>

</html>