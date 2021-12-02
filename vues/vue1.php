<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>test</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="vues/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vues/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="vues/assets/css/Article-List.css">
    <link rel="stylesheet" href="vues/assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="vues/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="vues/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="vues/assets/css/styles.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




</head>

<body style="min-height: 100vh; position: relative">
<div data-aos="slide-up" style="opacity: 1;filter: blur(0px) contrast(100%) hue-rotate(0deg);transform: scale(1);height: auto;">
    <section class="article-list"></section>
    <nav class="navbar navbar-dark navbar-expand navigation-clean-button" style="background: rgb(38,35,35);color: var(--bs-gray-100); height: 100px  ">
        <div class="container"><a class="navbar-brand" href="index.php" style="width: 103.6px;color: var(--bs-gray-100);">G-NYEWS</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><span class="navbar-text actions"> <a class="btn btn-light link-light action-button" role="button" data-bss-hover-animate="pulse" href="index.php?action=seConnecter" style="background: var(--bs-indigo);opacity: 1;">Connexion</a></span>
            </div>
        </div>
    </nav>
    <div class="container" style="padding: 0px 12px;">



        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin: 50px"  >

            <div class="carousel-inner">
                <?php if(sizeof($tabNews)>=1)  {
                    ?>
                    }
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $tabNews[0]->getImageN()?>" alt="First slide" style="width:1200px;height:600px;object-fit:cover">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $tabNews[0]->getTitreN(); ?></h5>
                            <p><?php echo $tabNews[0]->getDescriptionN(); ?></p>
                        </div>
                    </div>
                <?php }
                else { ?>
                     <div class="carousel-item active">
                        <img class="d-block w-100" src="vues/assets/img/pexels-ekrulila-3837409.jpg" alt="First slide" style="width:1200px;height:600px;object-fit:cover">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Ca semble vide par ici... </h5>
                        </div>
                     </div>
                <?php } ?>



                <?php if(sizeof($tabNews)>=2)  {
                    ?>

                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $tabNews[1]->getTitreN(); ?></h5>
                            <p><?php echo $tabNews[1]->getDescriptionN(); ?></p>
                        </div>
                        <img class="d-block w-100" src="<?php echo $tabNews[1]->getImageN()?>" alt="Second slide"  style="width:1200px;height:600px;object-fit:cover">
                    </div>
                <?php } ?>
                <?php if(sizeof($tabNews)>=3) {
                    ?>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $tabNews[2]->getTitreN(); ?></h5>
                            <p><?php echo $tabNews[2]->getDescriptionN(); ?></p>
                        </div>
                        <img class="d-block w-100" src="<?php echo $tabNews[2]->getImageN()?>" alt="Third slide"  style="width:1200px;height:600px;object-fit:cover">
                    </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php if($nbNewsTotal>0) { ?>
        <div class="intro">
            <h2 class="text-center">Derniers Articles</h2>
            <p class="text-center" style="color: rgb(0,0,0);">Voici les dernières nouveautés que G-NYEWS vous propose : </p>
        </div>
        <div class="row articles">
            <?php
                foreach($tabNews as $article) {
            ?>
            <div class='col-sm-6 col-md-4 item' style='margin-bottom: 70px;'>
                <img class='img-fluid' src='<?php echo $article->getImageN()?>' style="width:500px;height:200px;object-fit:cover">
                <h3 class='name'>
                    <a  href="index.php?action=cliquerNews&url=<?php echo $article->getLienN()?>"><?php echo $article->getTitreN()?></a>
                </h3>
                <p class='description'><?php echo $article->getDescriptionN(); ?></p>
                <a class='action' href='<?php echo $article->getLienN()?>'><i class='fa fa-arrow-circle-right' style='color: var(--bs-indigo);'></i>
                </a>
            </div>
            <?php
              }
                ?>


        </div>
        <div align="center">
            <a href="index.php?page=<?php echo $page-1 ?>"> &lt&lt </a>
            <?php echo "1 ..." ?>
            <?php echo $page ?>
            <?php echo ("... ".$nbPages) ?>
            <a href="index.php?page=<?php echo $page+1; ?>"> &gt&gt </a>

        </div>
        <?php } ?>
    </div>
</div>
<footer class="footer-basic" style="background: rgb(38,35,35); position: absolute;  bottom: 0; width: 100%; ">
    <p class="copyright">Guillaume &amp; Yannick © 2021</p>
</footer>
<script src="vues/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="vues/assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>


</html>


