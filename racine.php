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
		<li class="folder"><a href="menu.php">Dossier parent</a></li>

<?php
function scan($dir) {
    // On regarde déjà si le dossier existe
    if(is_dir($dir)) {
        // On le scan et on récupère dans un tableau le nom des fichiers et des dossiers en ignorant le dossier courant et le dossier précédent
        $files = array_diff(scandir($dir), array('..', '.'));
 
        // On tri le tableau de façon intelligente (à la façon humaine)
        // http://www.php.net/function.natcasesort
        natcasesort($files);
 
        // On commence par afficher les dossiers
        foreach($files as $f) {
            // S'il y a un dossier
            if(is_dir($dir.$f)) {
                // On affiche alors les données
                echo '<li class="folder"><a href="final.php?directory='.$dir.$f.'/">'.$f.'</a></li>';
            }
        }
 
        // Puis on affiche les fichiers
        foreach($files as $f) {
            // S'il y a un fichier
            if(is_file($dir.$f)) {
                echo '<a><li class="file" rel="'.$dir.$f.'">'.$f.'</li></a>';
            }
        }
    }
}
if (isset($_GET['directory'])) // On vérifie si le directory est bien donné
{
    if ($_GET['directory'] == "/" OR $_GET['directory'] == "/media/Donnees/" OR $_GET['directory'] == "/media/")
    {
        echo 'Tu fous quoi là??';
        echo 'Retourne à l accueil et recommence';
    }
    else
    {
        scan($_GET['directory']);
    }
}
else // Il manque des paramètres, on avertit le visiteur
{
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
