<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>
    <main>
        <section class="main-wrapper form-wrapper">
            <h2>Connexion</h2>

            <form action="" method="POST">
                <div class="form-email">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" placeholder="Votre email" name="email" required>
                </div>
                <div class="form-password">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Votre mot de passe" name="password" required>
                </div>
                <input type="submit" value="Se connecter" name="submit" class="btn-submit">
            </form>

        </section>

    </main>
    <footer>
        <?php include 'config/template/footer.php'; ?>
    </footer>
</body>

</html>