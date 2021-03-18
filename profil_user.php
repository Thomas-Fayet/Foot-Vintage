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
                        <li> <button class="button-profil-menu info-button" type="button">Vos informations</button> </li>
                        <li> <button class="button-profil-menu changePassword-button" type="button">Changer de mot de passe</button> </li>
                    </ul>
                </div>

                <div class="container-profil-info">
                    <button class="button-profil-info">
                        Modifier

                        <svg class="icon icon-edit">
                            <use xlink:href="#icon-edit"></use>
                        </svg>
                    </button>

                    <div class="separator-profil-info"> </div>

                    <ul class="profil-info">
                        <li>Nom :</li>
                        <li>Prénom :</li>
                        <li>Pseudo :</li>
                        <li>Civilité :</li>
                        <li>Adresse email :</li>
                        <li>Adresse postale :</li>
                        <li>Portable :</li>
                    </ul>
            </section>
        </section>
    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer>
</body>

</html>