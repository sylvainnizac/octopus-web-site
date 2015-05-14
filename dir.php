<?php
//Fonction de récupération de la liste des dossiers et fichiers. Les dossier sont juste des liens
function scan($dir) {
    // On regarde déjà si le dossier existe
    if(is_dir($dir)) {
        // On le scan et on récupère dans un tableau le nom des fichiers et des dossiers en ignorant le dossier courant et le dossier précédent
        $files = array_diff(scandir($dir), array('..', '.'));
 
        // On tri le tableau de façon intelligente (à la façon humaine)
        // http://www.php.net/function.natcasesort
        natcasesort($files);
        
        $suite = 0;
 
        // On commence par afficher les dossiers
        foreach($files as $f) {
            // S'il y a un dossier
            if(is_dir($dir.$f)) {
                // On affiche alors les données
                echo
                '<form id="'.$suite.'" action="final.php" method="post">
                    <input type="hidden" name="directory" value="'.$dir.$f.'/"/>
                </form>
                <li class="folder"><a href="#" onclick=\'document.getElementById("'.$suite.'").submit()\'>'.$f.'</a></li>';
                $suite = $suite + 1;
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
//Fonction de récupération de la liste des dossier et fichiers.
function scancomplete($dir) {
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
 
                // Et du coup comme c'est unroot dossier, on le rescan
                scancomplete($dir.$f."/");
 
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
//fonction de vérification de la validité des directory transmis
function verifdir($data_input, $mode){
    $legaldir = array(
        1 => "/media/Donnees/Ma musique/",
             "/media/Donnees/mes videos/",
             "/media/Donnees/mes animes/",
    );
    
    if ($mode == 'racine')
    {    
        if (array_key_exists($data_input, $legaldir))
        {
            $emplacement = $legaldir[$data_input];
            return $emplacement;
        }
        else
        {
            return False;
        }
    }
    elseif ($mode == 'final')
    {
        if (in_array($data_input, $legaldir))
        {
            return True;
        }
        else
        {
            return False;
        }
    }
    elseif ($mode == 'parent')
    {
        return array_search($data_input, $legaldir);
    }
}
?>
