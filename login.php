<?php

include 'config/template/head.php';


echo "<pre>";
print_r($_SESSION);
echo "</pre>";

//On ne peut pas accéder à cette page si la session 'user' a été créée.
if (isset($_SESSION['user'])) {
    header('location:profil_user.php?connect=forbidden');
    exit();
}

$content = "";


if (isset($_POST['envoyer']) && $_POST['envoyer'] == "Envoyer") {



    extract($_POST); // Convertir les indices en variables

    $queryUserValide = "SELECT * FROM user WHERE email_user = ?";
    $userValide = $DB->db->prepare($queryUserValide);
    $userValide->execute(
        [
            $email
        ]
    );

    // $count = $userValide->rowCount();
    $rowUserValide = $userValide->fetch(PDO::FETCH_ASSOC);


    if (!empty($email) && !empty($password)) {
        if (password_verify($password, $rowUserValide['password_user'])) {

            if ($email == "admin@gmail.com" && $password == "footvintageadmin") {
                $_SESSION['user']['role'] = $rowUserValide['role_user'];
                header('location:profil_admin.php');
                exit();
            }
            $_SESSION['user']['id'] = $rowUserValide['id_user'];
            $_SESSION['user']['pseudo'] = $rowUserValide['pseudo_user'];
            $_SESSION['user']['name'] = $rowUserValide['name_user'];
            $_SESSION['user']['firstName'] = $rowUserValide['firstName_user'];
            $_SESSION['user']['gender'] = $rowUserValide['gender_user'];
            $_SESSION['user']['address'] = $rowUserValide['address_user'];
            $_SESSION['user']['postalCode'] = $rowUserValide['postalCode_user'];
            $_SESSION['user']['city'] = $rowUserValide['city_user'];
            $_SESSION['user']['phone'] = $rowUserValide['phone_user'];
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['password'] = $password;
            $_SESSION['user']['role'] = $rowUserValide['role_user'];
            header('location:profil_user.php');
            exit();
        } else {
            $content .= "Erreur";
        }
    }
}

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