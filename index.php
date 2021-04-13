<?php

include 'config/template/head.php';
include 'config/template/nav.php';

$products = $DB->query('SELECT * FROM product');

?>


<main>
    <section class="main-wrapper">
        <h2 class="title-page">LA BOUTIQUE</h2>
        <div class="products-wrapper">
            <?php foreach ($products as $product) { ?>
                <a class="link-product" href="product_page.php?id=<?php echo $product['id_product']; ?>">
                    <div class="product-boxes product-one">
                        <img src="asset/img/<?php echo $product['mainPicture_product']; ?>-450x500.webp" alt="Maillot PSG extérieur 1975/76 devant">
                        <p class="products-description products-info"> <?php echo $product['name_product']; ?></p>
                        <div class="separator-info"> </div>
                        <p class="products-price products-info"> <?php echo $product['price_product']; ?> €</p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>
</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
</body>

</html>