<?php include 'config/template/head.php';

if (!isset($_SESSION['user'])) {
    header('location:index.php?connect=forbidden');
    exit();
}

if ($_SESSION['user']['role'] == "membre") {
    header('location:profil_user.php?connect=forbidden');
    exit();
}

$products = $DB->query('SELECT * FROM product');

?>

<?php include 'config/template/nav.php'; ?>

<main>
    <section class="main-wrapper">
        <h2 class="profil-title">ESPACE D'ADMINISTRATION</h2>

        <p class="title-admin-panel">Choix du produit à modifier :</p>

        <ul class="profil-container">
            <?php foreach ($products as $product) : ?>
                <li class="admin-panel">
                    <a class="form-submit-button" href="admin_product.php?id=<?= $product['id_product']; ?>"> <?= $product['name_product']; ?> </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>

<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>

</body>

</html>