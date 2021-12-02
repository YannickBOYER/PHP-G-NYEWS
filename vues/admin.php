<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test</title>
    <link rel="stylesheet" href="vues/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vues/assets/css/Article-List.css">
    <link rel="stylesheet" href="vues/assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="vues/assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="vues/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="vues/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="vues/assets/css/styles.css">
</head>

<body>
    <div data-aos="slide-up" style="opacity: 1;filter: blur(0px) contrast(100%) hue-rotate(0deg);transform: scale(1);height: auto;">
        <section class="article-list"></section>
        <nav class="navbar navbar-dark navbar-expand navigation-clean-button" style="background: rgb(38,35,35);color: var(--bs-gray-100); height: 100px">
            <div class="container"><a class="navbar-brand" href="index.php" style="width: 103.6px;color: var(--bs-gray-100);">G-NYEWS</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                    </ul><span class="navbar-text actions"> <a class="btn btn-light link-light action-button" role="button" data-bss-hover-animate="pulse" href="index.php" style="background: var(--bs-indigo);opacity: 1;">Déconnexion</a></span>
                </div>
            </div>
        </nav>
    </div>
    <div class="card-group" style="margin: 50px;">
        <div class="card" style="height: auto;"><img class="card-img-top w-100 d-block" src="vues/assets/img/News-media-standards.jpg">
            <form method="post" style="margin: 0;height: 425px;padding: 23px;width: auto;">
                <h2 class="text-center" style="width: auto;margin: 39px;">Ajouter un Site</h2>
                <div class="mb-3"></div><input class="form-control" type="text" name="nom" placeholder="Nom du site" style="padding: 6px 18px;margin: 0px;border-radius: 63px;">
                <div class="mb-3"></div><input class="form-control" type="text" name="logo" placeholder="Logo" style="padding: 6px 18px;margin: 0px;border-radius: 63px;">
                <div class="mb-3"></div><input class="form-control" type="text" name="lien" placeholder="Lien" style="padding: 6px 18px;margin: 0px;border-radius: 63px;">
                <div class="mb-3"></div><input class="form-control" type="text" name="flux" placeholder="Flux RSS" style="padding: 6px 18px;margin: 0px;border-radius: 33px;">
                <button class="btn btn-primary d-flex" name="action" value="ajouterSite" style="margin: 20px;background: var(--bs-indigo);border-color: var(--bs-indigo);margin-left: auto;margin-right: auto;width: auto;">Ajouter</button>
            </form>
        </div>
        <div class="card" style="padding: 0;">
            <div class="card-body" style="height: auto;">
                <h2 class="text-center" style="width: auto;margin: 39px;">Liste des Sites</h2>
                <ul class="list-group">
                    <?php
                        foreach($tabSite as $Site) {
                    ?>
                    <li class="list-group-item" style="margin: 3px;"><span><?php echo $Site->getNomS(); ?>  </span></li>
                    <?php
                        }
                    ?>
                </ul>
                <hr>
                <h2 class="text-center" style="width: auto;margin: 39px;">Supprimer un Site</h2>
                    <form method="post" class="d-flex justify-content-center align-items-center align-content-center" >
                    <select name="choixSuppr" class="align-content-center" style="margin: 24px;width: auto;height: 26px;">
                            <?php
                            foreach($tabSite as $Site) {
                            ?>
                            <option value="<?php echo $Site->getLienS() ?>" ><?php echo $Site->getNomS() ?> </option>
                                <?php
                            }
                            ?>
                        </select>

                    <button class="btn btn-primary d-flex" type="submit" name="action" value="supprimerSite" style="margin: 20px;background: var(--bs-indigo);border-color: var(--bs-indigo);">Supprimer</button>
                    </form>
                <hr>
                <h2 class="text-center" style="width: auto;margin: 39px;">Nombre de News Par Page</h2>
                <div class="d-flex justify-content-center align-items-center align-content-center">
                    <select  >
                            <option value="3" selected="">3</option>
                            <option value="6">6</option>
                            <option value="9">9</option>
                            <option value="12">12</option>
                    </select>
                    </div>
            </div>
        </div>
    </div>
    <footer class="footer-basic" style="background: rgb(38,35,35);">
        <p class="copyright">Guillaume &amp; Yannick © 2021</p>
    </footer>
    <script src="vues/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="vues/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>