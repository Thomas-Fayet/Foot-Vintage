<?php include 'config/template/head.php';

if (!isset($_SESSION['user'])) {
    header('location:index.php?connect=forbidden');
    exit();
}

if ($_SESSION['user']['role'] == "membre") {
    header('location:profil_user.php');
    exit();
}

$products = $DB->query('SELECT * FROM product');

?>

<?php include 'config/template/nav.php'; ?>

<main>

    <section class="main-wrapper">

        <h2 class="profil-title">ESPACE D'ADMINISTRATION</h2>


        <ul class="profil-container">
            <p>Choix du produit à modifier :</p>
            <?php foreach ($products as $product) : ?>
                <li class="product-description admin-panel">
                    <a href="admin_product.php?id=<?= $product['id_product']; ?>"> <?= $product['name_product']; ?> </a>
                </li>
            <?php endforeach; ?>
        </ul>



        <!-- <li class="product-description admin-panel">
                    <p>Quantité :</p>
                    <div class="quantity-price-container">
                        <button class="admin-button" id="admin-button-quantity-minus">-</button>
                        <input class="admin-input" value="14" type="number" name="product-quantity" id="product-quantity">
                        <button class="admin-button" id="admin-button-quantity-plus">+</button>
                    </div>
                </li>
                <li class="product-description admin-panel">
                    <p>Prix (€) :</p>
                    <div class="quantity-price-container">
                        <button class="admin-button" id="admin-button-price-minus">-</button>
                        <input class="admin-input" value="75" type="number" name="product-price" id="product-price">
                        <button class="admin-button" id="admin-button-price-plus">+</button>
                    </div>
                </li> -->
        <!-- <input class="form-submit-button admin-submit" type="submit" value="Modifier" name="envoyer"> -->

    </section>

</main>

<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>

</body>

</html>