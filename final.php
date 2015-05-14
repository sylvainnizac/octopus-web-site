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
                echo '<li class="folder"><a>'.$f.'</a></li>';
                echo '<ul class="tree">';
 
                // Et du coup comme c'est un dossier, on le rescan
                scan($dir.$f."/");
 
                echo '</ul>';
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
    if ($_GET['directory'] == "/" OR $_GET['directory'] == "/media/Donnees/" OR $_GET['directory'] == "/media/" OR $_GET['directory'] == "/media" OR $_GET['directory'] == "/media/Donnees")
    {
        echo '<li class="folder"><a href="menu.html">Accueil</a></li>';
        echo 'Tu fous quoi là??';
        echo 'Retourne à l accueil et recommence';
    }
    else
    {
    
    $split = explode("/", $_GET['directory']); //on découpe la chaine du dossier présent
    $nbr = count($split); //on compte le nombre d'éléments dont elle se compose
    unset($split[$nbr-1], $split[$nbr-2]); // on supprime les 2 derniers
    $previous = implode("/", $split); //on réassemble la chaine
        
    //on affiche le lien de retour au dossier parent
    echo '<li class="folder"><a href="racine.php?directory='.$previous.'/">Dossier parent</a></li>';
    
    scan($_GET['directory']);
    }
}
else // Il manque des paramètres, on avertit le visiteur
{
    echo 'Tu fous quoi là ??';
    echo 'Retourne à l accueil et recommence';
}
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	jQuery(function($){
		// On commence par cacher tous les sous dossiers
		$("ul.tree").hide();
 
		// Lors du click du un dossier
		$("li.folder").click(function () {
			// Si le dossier n'est pas ouvert on l'ouvre, sinon, on le ferme
			$(this).next("ul").toggle("fast");
		});
 
		// Lors du click sur un fichier
		$("li.file").click(function () {
			// On lance le téléchargement du fichier
			document.location = "dl.php?f="+$(this).attr("rel");
		});
	});
</script>

	</body>
</html>
