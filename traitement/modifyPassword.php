<?php

$content = "";
$contentUpdateValid = "";

// Traitement changement de mot de passe

if (isset($_POST['modifier_mot_de_passe']) && $_POST['modifier_mot_de_passe'] == "Modifier mot de passe") {
    
    extract($_POST); // Convertir les indices en variables

    if (!empty($oldPassword) && !empty($newPassword) && !empty($confirmNewPassword)) {

        if (!preg_match('/' . $oldPassword . '/', $_SESSION['user']['password'])) {
            $content .= "Votre ancien mot de passe est incorrect ! <br>";
        }

        if (preg_match('/[a-z]/', $newPassword)) { // On vérifie le mot de passe
            if (preg_match('/[A-Z]/', $newPassword)) {
                if (preg_match('/[0-9]/', $newPassword)) {
                    if (preg_match('/[%!?*]/', $newPassword)) {
                        if (iconv_strlen($newPassword) < 10 || iconv_strlen($newPassword) > 20) {
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

        if (!preg_match('/' . $newPassword . '/', $confirmNewPassword)) {
            $content .= "Les nouveaux mots de passe ne correspondent pas.<br>";
        }

        if (empty($content)) { // Si aucun champ d'alerte n'est affiché, alors toutes les informations sont valides, la modification de mot de passe a fonctionnée.
            $contentUpdateValid .= "Votre mot de passe a été modifié ! <br>";
            $passwordCrypt = password_hash($newPassword, PASSWORD_DEFAULT);
            $_SESSION['user']['password'] = $newPassword;
    
            //On modifie la table user avec le nouveau mot de passe
            $queryUpdatePassword = "UPDATE user SET password_user = ? WHERE email_user = ?";
            $updatePassword = $DB->db->prepare($queryUpdatePassword);
            $updatePassword->execute(
                [
                    $passwordCrypt,
                    $_SESSION['user']['email']
                ]
            );
        }
    }
}