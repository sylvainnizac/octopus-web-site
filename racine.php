<?php
//On accède à la session
session_start();
if(!isset($_SESSION['Id']))
{
    header('Location: index.php?message=fais pas chier log toi !');
    exit();
}
?>
<!DOCTYPE html>
<html class="degrade">
	<head>
		<title>Accueil Procrastinators association</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/global.css" rel="stylesheet" type="text/css" />
        <link href="css/carousel.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="menu.php">Procrastinator association</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="menu.php">Home</a>
                        </li>
                        
                        <li>
                            <form id="musique" action="racine.php" method="post">
                                <input type="hidden" name="directory" value="1"/>
                            </form>
                            <a href='#' onclick='document.getElementById("musique").submit()'>Musique</a>
                        </li>

                        <li>
                            <form id="film" action="racine.php" method="post">
                                <input type="hidden" name="directory" value="2"/>
                            </form>
                            <a href='#' onclick='document.getElementById("film").submit()'>Films</a>
                        </li>

                        <li>
                            <form id="animes" action="racine.php" method="post">
                                <input type="hidden" name="directory" value="3"/>
                            </form>
                            <a href='#' onclick='document.getElementById("animes").submit()'>Animes</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Déconnexion</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        
        <div class="container margnavbar affichliste">
            <div class="row">
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="chiffres">1...9</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="AB">A - B</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="CD">C - D</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="EF">E - F</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="GH">G - H</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="IJK">I - J - K</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="LMN">L - M - N</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="OPQ">O - P - Q</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="RST">R - S - T</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="UVW">U - V - W</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="XYZ">X - Y - Z</a>
                </div>
                <div class="col-xs-12 col-md-1">
                    <a class="folder" id="speciaux">Autres</a>
                </div>
            </div>
        </div>
        
        <div class="container">
        <?php
            include('dir.php');

            //Vérification de la validité des infos reçues
            $checked_dir = verifdir($_POST['directory'], 'racine');
            if ($checked_dir != False)
            {
                //les données sont bonnes, on poursuit la génération de la table
                scan($checked_dir);
            }
            else
            {
                //Les données reçues ne sont pas valables, message d'erreur
                echo '<a>Tu fous quoi là??</a>';
                echo '<a>Retourne à l accueil et recommence</a>';
            }
        ?>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">Tous ces morceaux sont la propriété bla bla bla...</p>
            </div>
        </footer>
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/docs.min.js"></script>
        <script type="text/javascript">
            
            jQuery(function($){
                // Lors du click du un dossier
                $("a.folder").click(function () {
                    var ids = $(this).attr('id');
                    $("ul.tree").not("."+ids).hide();
                    // Si le dossier n'est pas ouvert on l'ouvre, sinon, on le ferme
                    $("ul.tree."+ids).show("fast");
                });
 
                // Lors du click sur un fichier
                $(".file").click(function () {
                    // On lance le téléchargement du fichier
                    document.location = "dl.php?f="+$(this).attr("rel");
                });
            });
        </script>
	</body>
</html>
