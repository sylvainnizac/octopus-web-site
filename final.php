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
    //on affiche le lien de retour au dossier parent
    echo
        '<form id="retour" action="racine.php" method="post">
            <input type="hidden" name="directory" value="'.$parent.'"/>
        </form>
        <li class="folder"><a href="#" onclick=\'document.getElementById("retour").submit()\'>Dossier parent</a></li>';
    
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
