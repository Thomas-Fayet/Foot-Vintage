<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=foot-vintage;', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

if (isset($_POST['envoyer']))
{

    extract($_POST); // Convertir les indices en variables

    if (mb_strlen($pseudo) < 4 || mb_strlen($pseudo) > 20 ){
        echo "Veuillez saisir un pseudo entre 4 et 20 caractères.";
    } elseif (1 !== preg_match('~^[a-zA-Z0-9_-]+$~', $pseudo)) {
        echo 'Le pseudo ne peut contenir que des caractères non accentués, des chiffres, tirets et underscores.';
    } elseif ($tel ===! 10){
        echo "Veuillez saisir un numéro de téléphone valide";
    } elseif (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Veuillez saisir une adresse email valide.';
    } elseif (mb_strlen($password) < 10 || mb_strlen($password) > 20){
        echo "Veuillez saisir un mot de passe entre 10 et 20 caractères.";
    } elseif ($password =! $confirmPassword){
        echo "Les mots de passe ne correspondent pas.";
    } else { // toutes les informations sont valides, l'inscription a fonctionné.
        echo "Merci pour votre inscription";
        echo "<a href='login.php'>Se rendre sur à la page de connexion</a>" ;
        $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);

        //On insère les données saisies dans le formulaire dans la base de données.
        $pdo->query("INSERT INTO users (pseudo_user,address_user,phone_number_user,email_user,password_user,role_user) VALUES ('$pseudo','$address','$tel','$email','$passwordCrypt','membre')");
    } 
}

?>




<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
    <main>
        <section class="main-wrapper">
            <h2 class="form-title">INSCRIPTION</h2>
            <form action="" method="post">   
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo">
                <label for="civilite">Civilité</label>
                <select name="civilite" id="civilite">
                    <option value="monsieur">Monsieur</option>
                    <option value="madame">Madame</option>
                    <option value="autre">Autre</option>
                </select>
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse">
                <label for="code_postal">Code postal</label>
                <input type="number" name="code_postal" id="code_postal">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville">
                <label for="tel">Numéro de téléphone</label>
                <input type="tel" name="tel" id="tel">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
                <label for="confirmPassword">Confirmation de mot de passe</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
                <input class="form-submit-button" type="submit" value="Envoyer" name="envoyer">
            </form>
        </section>
    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer> 
</body>
</html>