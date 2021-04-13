<?php

include 'config/template/head.php';

//On ne peut pas accéder à cette page si la session 'user' a été créée.
if (!isset($_SESSION['user'])) {
    header('location:index.php?connect=forbidden');
    exit();
}

if ($_SESSION['user']['role'] == "admin"){
    header('location:profil_admin.php?connect=forbidden');
    exit();
}

include 'traitement/modifyPassword.php';
include 'traitement/modifyInfos.php';


include 'config/template/nav.php';?>

<main>
    <section class="main-wrapper">
        <section class="profil-wrapper">
            <div class="container-profil-menu">
                <h2>Votre profil</h2>
                <div class="separator-profil-menu"> </div>
                <ul class="profil-menu">
                    <li> <button id="button-info" class="button-profil-menu info-button" type="button">Vos informations</button> </li>
                    <li> <button id="button-password" class="button-profil-menu changePassword-button" type="button">Changer de mot de passe</button> </li>
                </ul>
            </div>

            <div id="container-profil-info" class="container-profil-info">
                <button id="button-update-info" class="button-profil-info">
                    Modifier
                    <svg class="icon icon-edit">
                        <use xlink:href="#icon-edit"></use>
                    </svg>
                </button>
                <div class="separator-profil-info"> </div>
                
                <div class="form-inscription-message form-message-error">
                    <p><?= $content; ?></p>
                </div>
                <div class="form-inscription-message form-message-valid">
                    <p><?= $contentUpdateValid; ?></p>
                </div>

                <ul id="profil-info" class="profil-info">
                    <li>Pseudo : <?php echo $_SESSION['user']['pseudo']; ?></li>
                    <li>Nom : <?php echo $_SESSION['user']['name']; ?></li>
                    <li>Prénom : <?php echo $_SESSION['user']['firstName']; ?></li>
                    <li>Civilité : <?php echo $_SESSION['user']['gender']; ?></li>
                    <li>Adresse : <?php echo $_SESSION['user']['address']; ?></li>
                    <li>Code postale: <?php echo $_SESSION['user']['postalCode']; ?></li>
                    <li>Ville : <?php echo $_SESSION['user']['city']; ?></li>
                    <li>N° de téléphone: <?php echo $_SESSION['user']['phone']; ?></li>
                    <li>E-mail : <?php echo $_SESSION['user']['email']; ?></li>
                </ul>

                <div id="profil-update-info" class="profil-update-info">
                    <form action="" method="post">

                        <label for="pseudo">Pseudo</label>
                        <input type="text" value ="<?php echo $_SESSION['user']['pseudo']; ?>" name="pseudo" id="pseudo" required>
                        
                        <label for="name">Nom</label>
                        <input type="text" value ="<?php echo $_SESSION['user']['name']; ?>" name="name" id="name" required>

                        <label for="firstName">Prénom</label>
                        <input type="text" value ="<?php echo $_SESSION['user']['firstName']; ?>" name="firstName" id="firstName"required>

                        <label for="gender">Civilité :</label>
                        <select name="gender" id="gender">
                            <option selected="selected" value="<?php echo $_SESSION['user']['gender']; ?>"><?php echo $_SESSION['user']['gender']; ?></option>
                            <?php if ($_SESSION['user']['gender'] == "monsieur"){ ?> 
                                <?= "<option value='madame'>madame</option>" ?>
                                <?= "<option value='autre'>autre</option>" ?>
                            <?php } elseif($_SESSION['user']['gender'] == "madame"){ ?>
                                <?= "<option value='monsieur'>monsieur</option>" ?>
                                <?= "<option value='autre'>autre</option>" ?>
                            <?php } else { ?>
                                <?= "<option value='monsieur'>monsieur</option>" ?>
                                <?= "<option value='madame'>madame</option>" ?>
                            <?php } ?>
                        </select>

                        <label for="address">Adresse</label>
                        <input type="text" value ="<?php echo $_SESSION['user']['address']; ?>" name="address" id="address" required>

                        <label for="postalCode">Code Postal</label>
                        <input type="number" value ="<?php echo $_SESSION['user']['postalCode']; ?>" name="postalCode" id="postalCode" required>

                        <label for="city">Ville</label>
                        <input type="text" value ="<?php echo $_SESSION['user']['city']; ?>" name="city" id="city" required>

                        <label for="phone">Téléphone</label>
                        <input type="text" value ="<?php echo $_SESSION['user']['phone']; ?>" name="phone" id="phone" required>
                        
                        <label for="email">Email</label>
                        <input type="email" value ="<?php echo $_SESSION['user']['email']; ?>" name="email" id="email" required>

                        <input class="form-submit-button button-update-info" type="submit" value="Modifier les informations" name="modifier_les_informations">
                    </form>
                </div>
            </div>

            <div id="container-password-forget" class="container-password-forget">
                <h2 class="form-title">MODIFIER MOT DE PASSE</h2>

                <form action="" method="POST">
                    <label for="oldPassword">Ancien Mot de passe</label>
                    <input type="password" name="oldPassword" id="oldPassword">
                    <label for="newPassword">Nouveau Mot de passe</label>
                    <input type="password" name="newPassword" id="newPassword">
                    <label for="confirmNewPassword">Confirmation de mot de passe</label>
                    <input type="password" name="confirmNewPassword" id="confirmNewPassword">
                    <input class="form-submit-button button-update-info" type="submit" value="Modifier mot de passe" name="modifier_mot_de_passe">
                </form>
            </div>
        </section>
    </section>
</main>
<footer>
    <?php include 'config/template/footer.php'; ?>
</footer>
<script src="asset/script/script-pageUser.js"></script>
</body>

</html>