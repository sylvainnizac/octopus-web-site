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
    <link href="css/thumbnail-gallery.css" rel="stylesheet" type="text/css" />
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
                    <li class="active"><a href="carousel.php">Accueil</a></li>
            <?php
            include('foncgalerie.php');
            navbar();            
            ?>
                </ul>
            </div>
          </div>
        </nav>
    <div class="container"><!-- margnavbar affichliste -->
        <div class="row">
            <?php
            entete($_POST['army']);            
            ?>
        </div>
        <div class="row">
            <div class="col-md-2 foldbg">
                <?php

                    if ($_POST['army'] == "1" OR $_POST['army'] == "5" OR $_POST['army'] == "8"){
                        recovarmy($_POST['army']);
                    }
                    else{
                        recovsecto($_POST['army']);
                    }
                ?>
            </div>
            <div class="col-md-10 foldbg">
                <?php
                    if ($_POST['army'] == "1" OR $_POST['army'] == "5" OR $_POST['army'] == "8"){
                        recovphotofac($_POST['army']);
                    }
                    else{
                        recovphotosecto($_POST['army']);
                    }
                ?>
            </div>
        </div>
    </div>    
    
      <!-- FOOTER -->
      <div class="container">
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <!--<p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>-->
      </footer>
      </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>
