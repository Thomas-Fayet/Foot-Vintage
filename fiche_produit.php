<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/style.css">
    <title>Page Produit</title>
</head>

<?php include 'config/template/head.php'; ?>

<body>
    <header>
        <?php include 'config/template/nav.php'; ?>
    </header>

    <main>
        <section class="home-wrapper">
            <div class="news-block">
                <h2>VOIR LES NOUVEAUTÉS</h2>
            </div>

            <section class="championship-wrapper">
                <div class="championship-boxes championship-one">
                    <h2>LIGUE 1</h2>
                </div>

                <div class="championship-boxes championship-two">
                    <h2>SERIE A</h2>
                </div>

                <div class="championship-boxes championship-three">
                    <h2>BPL</h2>
                </div>

                <div class="championship-boxes championship-four">
                    <h2>LIGA</h2>
                </div>
            </section>

            <section class="country-player-wrapper">
                <div class="country-player-block country-block">
                    <h2>SELECTION</h2>
                </div>

                <div class="country-player-block player-block">
                    <h2>JOUEURS</h2>
                </div>
            </section>
        </section>
    </main>

    <?php include 'config/template/footer.php'; ?>
</body>

</html>