<?php

include 'config/template/head.php';
include 'config/template/nav.php';

$id_product = $_GET['id'];

$products = $DB->query("SELECT * FROM product WHERE id_product = '$id_product' LIMIT 1");

?>

<main>
    <section class="main-wrapper">
        <nav class="breadcrumb">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">Clubs</a></li>
                <li><span aria-current="page">Fiche produit</span></li>
            </ul>
        </nav>
        <?php foreach ($products as $product) { ?>
            <h2><?php echo $product['name_product']; ?></h2>
            <div class="product-container">
                <div class="product-big-picture">
                    <img srcset="asset/img/<?php echo $product['mainPicture_product']; ?>-100x120.webp 100w,
                                asset/img/<?php echo $product['mainPicture_product']; ?>-250x300.webp 250w,
                                asset/img/<?php echo $product['mainPicture_product']; ?>-450x500.webp 450w" sizes="(max-width: 767px) 100px,
                            (max-width: 1439px) 250px,
                            800px" src="asset/img/<?php echo $product['mainPicture_product']; ?>-450x500.webp" alt="<?php echo $product['altFrontPicture_product']; ?>">
                </div>

                <div class="product-more-container">
                    <img class="product-more-picture" srcset="asset/img/<?php echo $product['frontPicture_product']; ?>-100x120.webp 100w,
                                asset/img/<?php echo $product['frontPicture_product']; ?>-250x300.webp 250w" sizes="(max-width: 767px) 100px, 250px" src="asset/img/<?php echo $product['frontPicture_product']; ?>-250x300.webp" alt="<?php echo $product['altFrontPicture_product']; ?>">

                    <img class="product-more-picture" srcset="asset/img/<?php echo $product['sidePicture_product']; ?>-100x120.webp 100w,
                            asset/img/<?php echo $product['sidePicture_product']; ?>-250x300.webp 250w" sizes="(max-width: 767px) 100px, 250px" src="asset/img/<?php echo $product['sidePicture_product']; ?>-250x300.webp" alt="<?php echo $product['altSidePicture_product']; ?>">

                    <img class="product-more-picture" srcset="asset/img/<?php echo $product['backPicture_product']; ?>-100x120.webp 100w,
                            asset/img/<?php echo $product['backPicture_product']; ?>-250x300.webp 250w" sizes="(max-width: 767px) 100px, 250px" src="asset/img/<?php echo $product['backPicture_product']; ?>-250x300.webp" alt="<?php echo $product['altBackPicture_product']; ?>">
                </div>

                <section class="product-infos-container">
                    <label for="product-size">Taille</label><br>
                    <select name="product-size" class="product-size" id="product-size">
                        <option value="">Choisir une taille</option>
                        <option value="1">Small</option>
                        <option value="2">Medium</option>
                        <option value="3">Large</option>
                    </select>
                    <p class="product-price"><?php echo $product['price_product']; ?> €</p>
                    <a class="add-to-cart" id="add-basket" href="addbasket.php?id=<?= $product['id_product'] ?>">AJOUTER AU PANIER</a>
                    <div class="product-payment">
                        <svg class="icon payment-pictures icon-paypal">
                            <use xlink:href="#icon-paypal"></use>
                        </svg>

                        <svg class="icon payment-pictures icon-mastercard">
                            <use xlink:href="#icon-mastercard"></use>
                        </svg>

                        <svg class="icon payment-pictures icon-americanexpress">
                            <use xlink:href="#icon-americanexpress"></use>
                        </svg>

                        <svg class="icon payment-pictures icon-visa-logo">
                            <use xlink:href="#icon-visa-logo"></use>
                        </svg>
                    </div>
                    <ul class="production-description-container">
                        <li class="product-description">
                            <p class="product-stock">Il reste <?php echo $product['stock_product']; ?> produits en stock</p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">Équipe : </p>
                            <p><?php echo $product['club_product']; ?></p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">Saison : </p>
                            <p><?php echo $product['season_product']; ?></p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">Marque : </p>
                            <p><?php echo $product['brand_product']; ?></p>
                        </li>
                        <li class="product-description">
                            <p class="product-description-title">État : </p>
                            <p><?php echo $product['condition_product']; ?> (voir photos)</p>
                        </li>
                    </ul>
                </section>
            </div>
        <?php } ?>
    </section>
</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
<script src="asset/script/script-addBasket.js"></script>
</body>

</html>