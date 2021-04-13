<?php

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

    if (check_pseudo($pseudo)) { // On vérfie le pseudo unique
        $content .= "Ce pseudo est déjà utilisé.<br>";
    }

    if ((mb_strlen($phone) != 10) || (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT))) { // On vérfie le telephone
        $content .= "Veuillez saisir un numéro de téléphone valide.<br>";
    }

    if ((mb_strlen($postalCode) != 5) || (!filter_var($postalCode, FILTER_VALIDATE_INT))) { // On vérfie le code postal
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