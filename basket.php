<?php 

include 'config/template/head.php';
include 'config/template/nav.php';

if (isset($_GET['del'])) {
    $basket->del_product($_GET['del']);
}

?>

<main>
    <section class="main-wrapper">
        <nav class="breadcrumb">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><span aria-current="page">Panier</span></li>
            </ul>
        </nav>

        <h2>Votre Panier</h2>

        <?php
        $ids = array_keys($_SESSION['basket']); // permet de récupérer les clés de la session basket, dans notre cas les id.

        echo ($_SESSION['basket']);
        // S'il n'ya pas de produit dans le panier, alors $products sera un tableau vide et non la requête qui permet d'extraire les ids (évite d'afficher une erreur lorsqu'on supprime les produits du panier)
        if (empty($ids)) {
            $products = array();
        } else {
            $products = $DB->query('SELECT * FROM product WHERE id_product IN (' . implode(',', $ids) . ')'); // implode permet de récupérer les ids de manière dynamique et se les séparer par une virgule.
        }
        
        foreach ($products as $product) :
        ?>
            <form action="basket.php" method="post">
                <div class="basket-wrapper">
                    <div class="basket-titles">
                        <span class="basket-titles-info">Nom de l'article</span>
                        <span class="basket-titles-quantity">Quantité</span>
                        <span class="basket-titles-price">Prix</span>
                        <span class="basket-titles-action">Action</span>
                    </div>

                    <div class="basket-container" id="basket-container-one">
                        <img class="basket-picture" srcset="asset/img/<?php echo $product['frontPicture_product']; ?>-100x120.webp 100w,
                                    asset/img/<?php echo $product['frontPicture_product']; ?>-250x300.webp 250w" sizes="(max-width: 767px) 100px, 250px" src="asset/img/<?php echo $product['frontPicture_product']; ?>-250x300.webp" alt="Maillot PSG extérieur 1975/76 devant">
                        <div class="basket-info-container">
                            <span class="product-title-basket"><?= $product['name_product']; ?></span>
                            <span class="product-size-basket">Size - XL</span>
                        </div>
                        <span class="basket-product-quantity"><input type="text" name="basket[quantity][<?= $product['id_product']; ?>]" value="<?= $_SESSION['basket'][$product['id_product']]; ?>"></span>
                        <span class="basket-product-price"><?= number_format($product['price_product'], 2, ',', ' ')  ?> €</span>
                        <a class="basket-button" id="delete-product-basket" href="basket.php?del=<?= $product['id_product']; ?>">X</a>
                    </div>

                    <span class="basket-total">TOTAL : <?= number_format($basket->price_total(), 2, ',', ' ') ?> €</span>
                </div>
            <?php endforeach; ?>
            <!-- <input type="submit" value="recalculer"> -->
            </form>


            <button class="add-to-cart basket-payment-button">ACHETER</button>
    </section>
</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
</body>

</html>