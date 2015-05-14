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
<html>
	<head>
		<title>Accueil Procrastinators association</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
        <div id="logout">
            <a href="logout.php">Déconnexion</a>
        </div>
		<div id="global">
			<div id="contenu">
				<img src="images/procrastinators_association.gif" class="logoPrincipal" alt="procrastinators logo" />
                
                <form id="musique" action="racine.php" method="post">
                    <input type="hidden" name="directory" value="1"/>
                </form>
                <h2><a href='#' onclick='document.getElementById("musique").submit()'>MUSIQUE</a></h2>
                
                <form id="film" action="racine.php" method="post">
                    <input type="hidden" name="directory" value="2"/>
                </form>
                <h2><a href='#' onclick='document.getElementById("film").submit()'>FILMS</a></h2>
                
                <form id="animes" action="racine.php" method="post">
                    <input type="hidden" name="directory" value="3"/>
                </form>
                <h2><a href='#' onclick='document.getElementById("animes").submit()'>ANIMES</a></h2>
			</div>
		</div>
	</body>
</html>
