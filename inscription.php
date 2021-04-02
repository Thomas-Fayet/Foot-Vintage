<?php

try { //on essaie de code...
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=foot-vintage;', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) { //...en cas d'erreur on la capture
    die('<ul><li>Erreur sur le fichier : ' . $e->getFile() . '</li><li>Erreur à la ligne ' . $e->getLine() . '</li><li>Message d\'erreur : ' . $e->getMessage() . '</li></ul>');
}

$content = "";
$contentInscriptionValid = "";

if (isset($_POST['envoyer']) && $_POST['envoyer'] == "Envoyer"){

    extract($_POST); // Convertir les indices en variables

    
    if (mb_strlen($pseudo) < 4 || mb_strlen($pseudo) > 20 ){ // On vérfie le pseudo
        $content .= "Veuillez saisir un pseudo entre 4 et 20 caractères.<br>";
    } 
    
    if (1 !== preg_match('~^[a-zA-Z0-9_-]+$~', $pseudo)) { 
        $content .= "Le pseudo ne peut contenir que des caractères non accentués, des chiffres, tirets et underscores.<br>";
    } 
    
    if ($phone ===! 10){ // On vérfie le telephone
        $content .= "Veuillez saisir un numéro de téléphone valide.<br>";
    } 
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // On vérfie le mail
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
    
    // if (mb_strlen($password) < 10 || mb_strlen($password) > 20){ // On vérfie le mot de passe
    //     $content .= "Veuillez saisir un mot de passe entre 10 et 20 caractères.";
    // } 
    
    if ($password =! $confirmPassword){
        $content .= "Les mots de passe ne correspondent pas.<br>";
    }
    
    if (empty($content)){ // Si aucun champ d'alerte n'est affiché, alors toutes les informations sont valides, l'inscription a fonctionné.
        $contentInscriptionValid .= "Merci pour votre inscription<br>";
        $contentInscriptionValid .= "<a href='login.php'>Se rendre sur à la page de connexion</a>" ;
        $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);

        //On insère les données saisies dans le formulaire dans la base de données.
        $queryInsert = "INSERT INTO user (pseudo_user,name_user,firstName_user,gender_user,address_user,postalCode_user,city_user,phone_user,email_user,password_user) VALUES (:pseudo,:name,:firstName,:gender,:address,:postalCode,:city,:phone,:email,:password)";
        $inscription = $pdo->prepare($queryInsert);
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




<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
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
                <input type="text" name="pseudo" id="pseudo">
                <label for="gender">Civilité</label>
                <select name="gender" id="gender">
                    <option value="monsieur">Monsieur</option>
                    <option value="madame">Madame</option>
                    <option value="autre">Autre</option>
                </select>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
                <label for="firstName">Prénom</label>
                <input type="text" name="firstName" id="firstName">
                <label for="address">Adresse</label>
                <input type="text" name="address" id="address">
                <label for="postalCode">Code postal</label>
                <input type="number" name="postalCode" id="postalCode">
                <label for="city">Ville</label>
                <input type="text" name="city" id="city">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" name="phone" id="phone">
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