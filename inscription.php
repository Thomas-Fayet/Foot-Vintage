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








<form action="" method="post">
    
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo"><br>
    <label for="civilite">Civilité</label>
    <select name="civilite" id="civilite">
        <option value="monsieur">Monsieur</option>
        <option value="madame">Madame</option>
        <option value="autre">Autre</option>
    </select>
    <label for="adresse">Adresse</label><br>
    <input type="text" name="adresse" id="adresse"><br>
    <label for="tel">Numéro de téléphone</label><br>
    <input type="tel" name="tel" id="tel"><br>
    <label for="email">E-mail</label><br>
    <input type="email" name="email" id="email"><br>
    <label for="password">Mot de passe</label><br>
    <input type="password" name="password" id="password"><br>
    <label for="confirmPassword">Confirmation de mot de passe</label><br>
    <input type="password" name="confirmPassword" id="confirmPassword"><br>
    <input type="submit" value="Envoyer" name="envoyer">
</form>