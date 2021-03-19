<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
    <main>
        <section class="main-wrapper">
            <h2 class="form-title">CONNEXION</h2>
            <form action="" method="post">   
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