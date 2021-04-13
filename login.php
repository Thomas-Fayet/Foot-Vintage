<?php

include 'config/template/head.php';

//On ne peut pas accéder à cette page si le membre est déja connecté
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "member") {
    header('location:profil_user.php?connect=forbidden');
    exit();
}

//On ne peut pas accéder à cette page si l'admin est déja connecté
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin") {
    header('location:profil_admin.php?connect=forbidden');
    exit();
}

include 'traitement/loginUser.php';

?>


<?php include 'config/template/nav.php'; ?>

<main>
    <section class="main-wrapper">
        <h2 class="form-title">CONNEXION</h2>
        <form action="" method="post">
            <div class="form-inscription-message form-message-error">
                <p><?= $content; ?></p>
            </div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <input class="form-submit-button" type="submit" value="Envoyer" name="envoyer">
        </form>
    </section>
</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
</body>

</html>