


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
    <nav class="navbar navbar-dark navbar-expand navigation-clean-button" style="background: rgb(38,35,35);color: var(--bs-gray-100); height: 100px ">
        <div class="container"><a class="navbar-brand" href="index.php" style="width: 103.6px;color: var(--bs-gray-100);">G-NYEWS</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><span class="navbar-text actions"> <a class="btn btn-light link-light action-button" role="button" data-bss-hover-animate="pulse" href="index.php?action=accesLogin" style="background: var(--bs-indigo);opacity: 1;">Admin</a></span>
            </div>
        </div>
    </nav>
    <div style="text-align: center" >
    <?php
if(isset($tVueErreur) && !empty($tVueErreur)) {
    foreach ($tVueErreur as $value) { ?>
        <h1><?php echo $value; ?></h1>

    <?php
    }
}
else{
    echo "pas d'erreur <br/>";
}
?>
    </div>
</div>

<footer class="footer-basic" style="background: rgb(38,35,35); position: absolute;  bottom: 0; width: 100%; ">
    <p class="copyright">Guillaume &amp; Yannick © 2021</p>
</footer>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>


