<!DOCTYPE html>
<html lang="fr" class="degrade">
  <head>
    <title>Galerie de peinture</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/global.css" rel="stylesheet" type="text/css" />
    <link href="css/footer.css" rel="stylesheet" type="text/css" />
    <!-- affiche une icone avant le nom dans l'onglet -->
    <!-- <link rel="icon" href="../../favicon.ico"> -->
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>

<!-- NAVBAR
================================================== -->
  <body>
        <nav class="navbar navbar-inverse navbar-static-top unmargnavbot navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Galerie</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Accueil</a></li>
                  
            <?php
            include('foncgalerie.php');
            navbar();            
            ?>
            
                </ul>
            </div>
          </div>
        </nav>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide margnavbar" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img src="images/InfinityNomads1280x960.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Nomades</h1>
              <p>Not Yet</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Voir la galerie</a></p>
            </div>
          </div>
        </div>

        <div class="item">
          <img src="images/EquipeMirage.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Ariadna</h1>
              <p>Not Yet</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Voir la galeries</a></p>
            </div>
          </div>
        </div>

        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>

      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/Logos/Nomades.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Nomades</h2>
          <p>Les Nomades possèdent trois énormes vaisseaux. Refusant une société contrôlée par ces grands blocs macro-économiques et par l’IA ALEPH, ils s’en sont séparés et errent dans l’espace en commerçant de système en système. Le vaisseau Tunguska se consacre au trafic et au stockage d’informations. Corregidor propose de la main d’œuvre spécialisée bon marché et Bakunin fait commerce de tout ce qui est exotique et illégal, de la mode à la nano-ingénierie.</p>
          <p><a class="btn btn-default" href="#" role="button">Détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/Logos/Ariadna.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Ariadna</h2>
          <p>Ariadna est composée des descendants du premier vaisseau colonisateur humain, qui a disparu dans un trou de ver et a été porté disparu. Isolés sur une planète éloignée et hostile, les habitants d’Ariadna – Cosaques, Américains, Ecossais et Français – sont devenus une race dure et technologiquement moins avancée, qui vient d’entrer en contact avec la Sphère Humaine et essaye de se faire une place sans se soumettre aux autres puissances.</p>
          <p><a class="btn btn-default" href="#" role="button">Détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/Logos/YuJing.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Yu Jing</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">Détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"><font color="#4f5c67">Evil Ram. </font><span class="text-muted"><font color="#6A747C">Chargeeez!</font></span></h2>
          <p class="lead"><font color="#4f5c67">Pupnik de l'Überfallkommando de Bakunin. Parcequ'un bélier génétiquement modifié, c'est classe.</font></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="images/Evil-Ram.png" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="images/lupe_balboa_by_litilusvern-d8g329m.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading"><font color="#202529">Lupe Balboa. </font><span class="text-muted"><font color="#959A9D">See for yourself.</font></span></h2>
          <p class="lead"><font color="#202529">« Désolé, tu essaies de dire quelque chose ? Je ne t’entends pas à cause du bruit que je fais en te bottant le cul. »<br>
                                                Vortex Guadalupe « Lupe » Balboa.</font></p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"><font color="#959A9D">Wildcat n°1. </font><span class="text-muted"><font color="#73797E">Spitfire!!</font></span></h2>
          <p class="lead"><font color="#959A9D">« Mission go. Vous connaissez déjà les paramètres opératoires : pas de prisonnier ni de négociation. On entre, on tue, on sort. »<br>
                                                Sergent Artilleur Charles Mucavele, Unité Wildcats. Raid sur la station I+R Starborn-3, prétendument liée à ALEPH. Conflits Fantômes.</font></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="images/wildcat_spitfire_by_litilusvern-d8g31vo.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <!--<p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>-->
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>
