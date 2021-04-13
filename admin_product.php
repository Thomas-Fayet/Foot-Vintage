<?php
include 'config/template/head.php';

if (!isset($_SESSION['user'])) {
    header('location:index.php?connect=forbidden');
    exit();
}

if ($_SESSION['user']['role'] == "membre") {
    header('location:profil_user.php');
    exit();
}

$id_product = $_GET['id'];
$content = "";
$contentUpdateValid = "";

if (isset($_POST['edit']) && $_POST['edit'] == "Modifier") {
    $product_quantity = $_POST['product-quantity'];
    $product_price = $_POST['product-price'];

    if (!filter_var($product_quantity, FILTER_VALIDATE_INT)) {
        $content .= "Veuillez saisir une quantité valide.<br>";
    }

    if (!filter_var($product_price, FILTER_VALIDATE_INT)) {
        $content .= "Veuillez saisir un prix valide.<br>";
    }

    if ($product_price < 0) {
        $content .= 'Le prix du produit ne peut pas être inférieur à 0';
    }
    if (empty($content)) {
        $contentUpdateValid .= "Votre produit a bien été mis à jour";
        $queryUpdateProduct = "UPDATE product SET stock_product = ? , price_product = ? WHERE id_product = ?";
        $updateProduct = $DB->db->prepare($queryUpdateProduct);
        $updateProduct->execute(
            [
                $product_quantity,
                $product_price,
                $id_product
            ]
        );
    }
}

$products = $DB->query("SELECT * FROM product WHERE id_product = '$id_product' LIMIT 1");

?>

<?php include 'config/template/nav.php'; ?>

<main>

    <section class="main-wrapper">

        <h2 class="profil-title">ESPACE D'ADMINISTRATION</h2>

        <div class="form-inscription-message form-message-error">
            <p><?= $content; ?></p>
        </div>

        <div class="form-inscription-message form-message-valid">
            <p><?= $contentUpdateValid; ?></p>
        </div>

        <form class="admin-form" action="" method="POST">

            <div class="admin-product-container">
                <?php foreach ($products as $product) : ?>
                    <div class="product-big-picture admin-product-picture">
                        <img srcset="asset/img/<?php echo $product['mainPicture_product']; ?>-100x120.webp 100w,
                                    asset/img/<?php echo $product['mainPicture_product']; ?>-250x300.webp 250w,
                                    asset/img/<?php echo $product['mainPicture_product']; ?>-450x500.webp 450w" sizes="(max-width: 767px) 100px,
                                (max-width: 1439px) 250px,
                                800px" src="asset/img/<?php echo $product['mainPicture_product']; ?>-450x500.webp" alt="<?php $product['altFrontPicture_product'] ?>">
                    </div>

                    <h3><?php echo $product['name_product']; ?></h3>

                    <div class="quantity-price-container admin-product-quantity">
                        <span>Quantité :</span>
                        <div class="admin-button" id="admin-button-quantity-minus">-</div>
                        <input class="admin-input" value="<?= $product['stock_product']; ?>" type="number" name="product-quantity" id="product-quantity">
                        <div class="admin-button" id="admin-button-quantity-plus">+</div>
                    </div>

                    <div class="quantity-price-container admin-product-price">
                        <span>Prix (€) :</span>
                        <div class="admin-button" id="admin-button-price-minus">-</div>
                        <input class="admin-input" value="<?= $product['price_product']; ?>" type="number" name="product-price" id="product-price">
                        <div class="admin-button" id="admin-button-price-plus">+</div>
                    </div>

                    <input class="form-submit-button admin-submit" type="submit" value="Modifier" name="edit">

                <?php endforeach; ?>
            </div>

            <div class="form-button-container">
                <a class="form-submit-button" href="profil_admin.php"> retour aux produits </a>
            </div>

        </form>





    </section>

</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
<script src="asset/script/script-pageAdmin.js"></script>
</body>

</html>