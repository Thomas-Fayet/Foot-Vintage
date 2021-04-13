<?php 

include 'config/template/head.php';


if (isset($_GET['del'])) {
    $basket->del_product($_GET['del']);
}

include 'config/template/nav.php';?>

<main>
    <section class="main-wrapper">
        <nav class="breadcrumb">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><span aria-current="page">Panier</span></li>
            </ul>
        </nav>

        <h2>Votre Panier</h2>

        <?php if (!isset($_SESSION['user'])) { ?> <!-- L'utilisateur doit se connecter s'il veut accéder au panier -->
            <a class="form-submit-button" href="inscription.php">S'inscrire</a><br>
            <a class="form-submit-button" href="login.php">Se connecter</a>
        <?php } else {

            $ids = array_keys($_SESSION['basket']); // permet de récupérer les clés de la session basket, dans notre cas les id.

            // S'il n'ya pas de produit dans le panier, alors $products sera un tableau vide et non la requête qui permet d'extraire les ids (évite d'afficher une erreur lorsqu'on supprime les produits du panier)
            if (empty($ids)) {
                $products = array();
            } else {
                $products = $DB->query('SELECT * FROM product WHERE id_product IN (' . implode(',', $ids) . ')'); // implode permet de récupérer les ids de manière dynamique et se les séparer par une virgule.
            }
            
            foreach ($products as $product) :
            ?>
                <form class="basket-form" action="basket.php" method="post">
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
                                <span class="product-size-basket">Taille : <?= $product['size_product']; ?></span>
                            </div>
                            <span class="basket-product-quantity"><input class="quantity-product" id="quantity-product-<?= $product['id_product']; ?>" type="text" name="basket[quantity][<?= $product['id_product']; ?>]" value="<?= $_SESSION['basket'][$product['id_product']]; ?>"></span>
                            <span class="basket-product-price"><?= number_format($product['price_product'], 2, ',', ' ')  ?> €</span>
                            <a class="basket-button" id="delete-product-basket" href="basket.php?del=<?= $product['id_product']; ?>">X</a>
                        </div>
                    </div>
                    
                <?php endforeach; ?>
                <span class="basket-total">TOTAL : <?= number_format($basket->price_total(), 2, ',', ' ') ?> €</span>
                <input id="actualise-basket" type="submit" value="recalculer">
                </form>


                <button class="add-to-cart basket-payment-button">ACHETER</button>
            <?php } ?>
    </section>
</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
<script src="asset/script/script-basket.js"></script>
</body>

</html>