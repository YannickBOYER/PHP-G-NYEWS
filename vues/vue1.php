<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test</title>
    <link rel="stylesheet" href="vues/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vues/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="vues/assets/css/Article-List.css">
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
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background: rgb(38,35,35);color: var(--bs-gray-100); ">
        <div class="container"><a class="navbar-brand" href="vue1.php" style="width: 103.6px;color: var(--bs-gray-100);">G-NYEWS</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><span class="navbar-text actions"> <a class="btn btn-light link-light action-button" role="button" data-bss-hover-animate="pulse" href="login.php" style="background: var(--bs-indigo);opacity: 1;">Connexion</a></span>
            </div>
        </div>
    </nav>
    <div class="container" style="padding: 0px 12px;">
        <div class="carousel slide" data-bs-ride="carousel" id="carousel-1" style="margin-top: 70px;margin-bottom: 70px;">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image" style="margin: 0px;"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
            </ol>
        </div>
        <div class="intro">
            <h2 class="text-center">Derniers Articles</h2>
            <p class="text-center" style="color: rgb(0,0,0);">Voici les dernières nouveautés que G-NYEWS vous propose : </p>
        </div>
        <div class="row articles">
            <?php
                require_once ("Connection.php");
                require_once ("NewsGateway.php");
                require_once ("news.php");

                try {
                    $dsn='mysql:host=localhost;dbname=dbyaboyer';
                    $user='yaboyer';
                    $password='1234';
                    $con = new Connection($dsn,$user,$password);
                    $GW = new NewsGateway($con);
                    $tab=$GW->findAllNews();
                    foreach($tab as $article) {
                        echo("<div class='col-sm-6 col-md-4 item' style='margin-bottom: 70px;'><a href='#'><img class='img-fluid' src='assets/img/desk.jpg'></a><h3 class='name'>".$article->getTitreN()."</h3><p class='description'>".$article->getDescriptionN()."</p><a class='action' href='#'><i class='fa fa-arrow-circle-right' style='color: var(--bs-indigo);'></i></a></div>");
                    }
                    echo '<li><a href="index.php?page='.($page + 1).'"> NEXT </a></li>';
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            ?>

        </div>
    </div>
</div>
<footer class="footer-basic" style="background: rgb(38,35,35);">
    <p class="copyright">Guillaume &amp; Yannick © 2021</p>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>


