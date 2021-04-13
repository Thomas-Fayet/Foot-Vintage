<?php

include 'config/template/head.php';
include 'config/template/nav.php';
//On ne peut pas accéder à cette page si la session 'user' a été créée.
if (isset($_SESSION['user'])) {
    header('location:inscription.php?connect=forbidden');
    exit();
}

$content = "";
$contentInscriptionValid = "";

if (isset($_POST['envoyer']) && $_POST['envoyer'] == "Envoyer") {

    extract($_POST); // Convertir les indices en variables


    if (mb_strlen($pseudo) < 4 || mb_strlen($pseudo) > 20) { // On vérfie le pseudo
        $content .= "Veuillez saisir un pseudo entre 4 et 20 caractères.<br>";
    }

    if (1 !== preg_match('~^[a-zA-Z0-9_-]+$~', $pseudo)) {
        $content .= "Le pseudo ne peut contenir que des caractères non accentués, des chiffres, tirets et underscores.<br>";
    }

    if ((mb_strlen($phone) != 10) || (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT))) { // On vérfie le telephone
        $content .= "Veuillez saisir un numéro de téléphone valide.<br>";
    }

    if (mb_strlen($postalCode) != 5 ) { // On vérfie le code postal
        $content .= "Veuillez saisir un code postal valide.<br>";
    }

    if ((!filter_var($email, FILTER_VALIDATE_EMAIL) || (preg_match('#yopmail.com$#', $email)))) { // On vérfie le mail
        $content .= "Veuillez saisir une adresse email valide.<br>";
    }

    if (preg_match('/[a-z]/', $password)) { // On vérifie le mot de passe
        if (preg_match('/[A-Z]/', $password)) {
            if (preg_match('/[0-9]/', $password)) {
                if (preg_match('/[%!?*]/', $password)) {
                    if (iconv_strlen($password) < 10 || iconv_strlen($password) > 20) {
                        $content .= "Veuillez saisir un mot de passe entre 10 et 20 caractères.<br>";
                    }
                } else {
                    $content .= "Veuillez saisir un mot de passe avec un caractère spécial [%!?*].<br>";
                }
            } else {
                $content .= "Veuillez saisir un mot de passe avec un chiffre.<br>";
            }
        } else {
            $content .= "Veuillez saisir un mot de passe avec une lettre majuscule.<br>";
        }
    } else {
        $content .= "Veuillez saisir un mot de passe avec une lettre minuscule.<br>";
    }

    if (!preg_match('/' . $confirmPassword . '/', $password)) {
        $content .= "Les mots de passe ne correspondent pas.<br>";
    }

    if (empty($content)) { // Si aucun champ d'alerte n'est affiché, alors toutes les informations sont valides, l'inscription a fonctionné.
        $contentInscriptionValid .= "Merci pour votre inscription<br>";
        $contentInscriptionValid .= "<a href='login.php'>Se rendre sur à la page de connexion</a>";
        $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);

        //On insère les données saisies dans le formulaire dans la base de données.
        $queryInsert = "INSERT INTO user (pseudo_user,name_user,firstName_user,gender_user,address_user,postalCode_user,city_user,phone_user,email_user,password_user) VALUES (:pseudo,:name,:firstName,:gender,:address,:postalCode,:city,:phone,:email,:password)";
        $inscription = $DB->db->prepare($queryInsert);
        $inscription->execute(
            [
                'pseudo' => $pseudo,
                'name' => $name,
                'firstName' => $firstName,
                'gender' => $gender,
                'address' => $address,
                'postalCode' => $postalCode,
                'city' => $city,
                'phone' => $phone,
                'email' => $email,
                'password' => $passwordCrypt
            ]
        );
    }
}

?>

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