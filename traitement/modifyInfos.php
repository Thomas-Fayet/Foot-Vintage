<?php

$content = "";
$contentUpdateValid = "";

// Traitement informations utilisateur

if (isset($_POST['modifier_les_informations']) && $_POST['modifier_les_informations'] == "Modifier les informations") {

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

    if (empty($content)) { // Si aucun champ d'alerte n'est affiché, alors toutes les informations sont valides, la modification de mot de passe a fonctionnée.
        $contentUpdateValid .= "Vos informations ont été modifié ! <br>";
        
        $_SESSION['user']['pseudo'] = $pseudo;
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['firstName'] = $firstName;
        $_SESSION['user']['gender'] = $gender;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['postalCode'] = $postalCode;
        $_SESSION['user']['city'] = $city;
        $_SESSION['user']['phone'] = $phone;

        //On modifie la table user avec l'ensemble des infos
        $queryUpdateInfos = "UPDATE user SET pseudo_user = ?, name_user = ?, firstName_user = ?, gender_user = ?, address_user = ?, postalCode_user = ?, city_user = ?, phone_user = ?, email_user = ? WHERE id_user = ?";
        $updateInfos = $DB->db->prepare($queryUpdateInfos);
        $updateInfos->execute(
            [
                $pseudo,
                $name,
                $firstName,
                $gender,
                $address,
                $postalCode,
                $city,
                $phone,
                $email,
                $_SESSION['user']['id']
            ]
        );
    }
}
