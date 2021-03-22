<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
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

                    <ul id="profil-info" class="profil-info">
                        <li>Nom :</li>
                        <li>Prénom :</li>
                        <li>Pseudo :</li>
                        <li>Civilité :</li>
                        <li>E-mail :</li>
                        <li>Adresse :</li>
                        <li>Code postale:</li>
                        <li>Ville :</li>
                        <li>N° de téléphone:</li>
                    </ul>

                    <div id="profil-update-info" class="profil-update-info">
                        <form action="" method="post">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom">

                            <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" id="prenom">

                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" id="pseudo">

                            <label for="civilite">Civilité :</label>
                            <select name="civilite" id="civilite">
                                <option value="monsieur">Monsieur</option>
                                <option value="madame">Madame</option>
                                <option value="autre">Autre</option>
                            </select>

                            <label for="email">E-mail :</label>
                            <input type="email" name="email" id="email">

                            <label for="adresse">Adresse :</label>
                            <input type="text" name="adresse" id="adresse">

                            <label for="code_postal">Code postal :</label>
                            <input type="number" name="code_postal" id="code_postal">

                            <label for="ville">Ville :</label>
                            <input type="text" name="ville" id="ville">

                            <label for="tel">N° de téléphone :</label>
                            <input type="tel" name="tel" id="tel">


                            <input class="form-submit-button button-update-info" type="submit" value="Enregistrer" name="envoyer">
                        </form>
                    </div>
                </div>

                <div id="container-password-forget" class="container-password-forget">
                    <h2 class="form-title">MOT DE PASSE OUBLIE</h2>

                    <form action="" method="POST">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email">
                        <input class="form-submit-button" type="submit" value="Envoyer" name="envoyer">
                    </form>
                </div>
            </section>
        </section>
    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer>
    <script src="asset/script/script.js"></script>
</body>

</html>