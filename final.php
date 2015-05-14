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
            <?php
                $split = explode("/", $_POST['directory']); //on découpe la chaine du dossier présent
                $nbr = count($split);
                $actual = $split[$nbr-2];
                echo
                    '<div class="row foldbg" style="text-align: center;">'.$actual.'</div>';
            ?>
        </div>
        
        <div class="container">
        <?php
        include('dir.php');

        if (isset($_POST['directory'])) // On vérifie si le directory est bien donné
        {
            // On recréé la chaine du "grand parent" qui est logiquement la racine de recherche: musique, vidéo,...
            $split = explode("/", $_POST['directory']); //on découpe la chaine du dossier présent
            $nbr = count($split); //on compte le nombre d'éléments dont elle se compose
            unset($split[$nbr-1], $split[$nbr-2]); // on supprime les 2 derniers
            $previous = implode("/", $split); //on réassemble la chaine

            if (verifdir($previous."/", 'final'))
            {
                //on reccherche l'identifiant du dossier parent
                $parent = verifdir($previous."/", 'parent');
    
                scancomplete($_POST['directory']);
    
            }
            else
            {
                echo '<li class="folder"><a href="menu.php">Accueil</a></li>';
                echo 'Tu fous quoi là??';
                echo 'Retourne à l accueil et recommence';
            }
        }
        else // Il manque des paramètres, on avertit le visiteur
        {
            echo 'Tu fous quoi là ??';
            echo 'Retourne à l accueil et recommence';
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
                // On commence par cacher tous les sous dossiers
                $("ul.tree").hide();
 
                // Lors du click du un dossier
                $(".folder").click(function () {
                    // Si le dossier n'est pas ouvert on l'ouvre, sinon, on le ferme
                    $(this).next("ul").toggle("fast");
                });
 
                // Lors du click sur un fichier
                $("div.file").click(function () {
                    // On lance le téléchargement du fichier
                    document.location = "dl.php?f="+$(this).attr("rel");
                });
            });
        </script>

	</body>
</html>
