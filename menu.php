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
        <link href="css/footer.css" rel="stylesheet" type="text/css" />
        <!-- affiche une icone avant le nom dans l'onglet -->
        <!-- <link rel="icon" href="../../favicon.ico"> -->
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

		<div class="container">
			<img src="images/procrastinators_association.gif" class="logoPrincipal paddnavbar" alt="procrastinators logo" />
		</div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">Procrastinator's Association logo by Ramy on Deviant Art.</p>
            </div>
        </footer>

	</body>
</html>
