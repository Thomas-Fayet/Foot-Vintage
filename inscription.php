<?php

include 'config/template/head.php';

//On ne peut pas accéder à cette page si la session 'user' a été créée.
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "member") {
    header('location:profil_user.php?connect=forbidden');
    exit();
}

if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin") {
    header('location:profil_admin.php?connect=forbidden');
    exit();
}

include 'traitement/inscriptionUser.php';


include 'config/template/nav.php';?>

<main>
    <section class="main-wrapper">
        <h2 class="form-title">INSCRIPTION</h2>
        <form action="" method="post">
            <div class="form-inscription-message form-message-error">
                <p><?= $content; ?></p>
            </div>
            <div class="form-inscription-message form-message-valid">
                <p><?= $contentInscriptionValid; ?></p>
            </div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" required>
            <label for="gender">Civilité</label>
            <select name="gender" id="gender">
                <option value="monsieur">Monsieur</option>
                <option value="madame">Madame</option>
                <option value="autre">Autre</option>
            </select>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" required>
            <label for="firstName">Prénom</label>
            <input type="text" name="firstName" id="firstName" required>
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" required>
            <label for="postalCode">Code postal</label>
            <input type="number" name="postalCode" id="postalCode" required>
            <label for="city">Ville</label>
            <input type="text" name="city" id="city" required>
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" id="phone" required>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            <label for="confirmPassword">Confirmation de mot de passe</label>
            <input type="password" name="confirmPassword" id="confirmPassword" required>
            <input class="form-submit-button" type="submit" value="Envoyer" name="envoyer">
        </form>
    </section>
</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
</body>

</html>