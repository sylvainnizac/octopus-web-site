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
			</div>
		</div>
		<!-- ajout du lien vers le dossier parent-->
		<li class="folder"><a href="menu.php">Retour au menu</a></li>

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
    echo 'Tu fous quoi là??';
    echo 'Retourne à l accueil et recommence';
}
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	jQuery(function($){
		// Lors du click sur un fichier
		$("li.file").click(function () {
			// On lance le téléchargement du fichier
			document.location = "dl.php?f="+$(this).attr("rel");
		});
	});
</script>

	</body>
</html>
