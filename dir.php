<?php
//Fonction de récupération de la liste des dossiers et fichiers. Les dossier sont juste des liens
function scan($dir) {
    include('classes.php');
    // On regarde déjà si le dossier existe
    if(is_dir($dir)) {
        // On le scan et on récupère dans un tableau le nom des fichiers et des dossiers en ignorant le dossier courant et le dossier précédent
        $files = array_diff(scandir($dir), array('..', '.'));
 
        // On tri le tableau de façon intelligente (à la façon humaine)
        // http://www.php.net/function.natcasesort
        natcasesort($files);
        
        $suite = 0;

        //on charge le tableau des objets servant à contenir les résultats
        $array_of_the_dead = array(
            new MorceauListe(array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"), 'chiffres'),
            new MorceauListe(array(A, B, a, b), 'AB'),
            new MorceauListe(array(C, D, c, d), 'CD'),
            new MorceauListe(array(E, F, e, f), 'EF'),
            new MorceauListe(array(G, H, g, h), 'GH'),
            new MorceauListe(array(I, J, K, i, j, k), 'IJK'),
            new MorceauListe(array(L, M, N, l, m, n), 'LMN'),
            new MorceauListe(array(O, P, Q, o, p, q), 'OPQ'),
            new MorceauListe(array(R, S, T, r, s, t), 'RST'),
            new MorceauListe(array(U, V, W, u, v, w), 'UVW'),
            new MorceauListe(array(X, Y, Z, x, y, z), 'XYZ'),
            new MorceauListe(array(), 'speciaux')
        );
 
        // On parcours la liste des dossier et fichiers
        foreach($files as $f) {
            // S'il y a un dossier
            if(is_dir($dir.$f)) {
                //on regarde dans quel le premier caractère du nom de dossier 
                foreach ($array_of_the_dead as $aotd) {
                    //on déplace le nom de dossier dans le bon objet
                    if (in_array($f[0], $aotd->searchchar)) {
                        $aotd->founddir[] = $f;
                    }
                }
            }
        }
 
        //on parcours les objets
        foreach ($array_of_the_dead as $aotd) {
            //affichage de l'entête de partie
            echo '<ul class="tree '.$aotd->groupname.'" style="display: none;">';
                //chargement de la partie avec les bonnes entrée
                foreach ($aotd->founddir as $fd) {
                    echo
                        '<form id="'.$suite.'" action="final.php" method="post">
                            <input type="hidden" name="directory" value="'.$dir.$fd.'/"/>
                        </form>
                        <div class="foldpadd">
                            <div class="row foldbg" onclick=\'document.getElementById("'.$suite.'").submit()\'>'.$fd.'</div>
                        </div>';
                        $suite = $suite + 1;
                }
                //balise de fin de partie
                echo '</ul>';
        }



        // Puis on affiche les fichiers
        foreach($files as $f) {
            // S'il y a un fichier
            if(is_file($dir.$f)) {
                echo '<div class="row file" rel="'.$dir.$f.'">'.$f.'</div>';
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
                echo
                    '<div class="foldpadd">
                        <div class="row folder foldbg">'.$f.'</div>
                    <ul class="tree">';
 
                // Et du coup comme c'est unroot dossier, on le rescan
                scancomplete($dir.$f."/");
 
                echo '</ul></div>';
            }
        }
 
        // Puis on affiche les fichiers
        foreach($files as $f) {
            // S'il y a un fichier
            if(is_file($dir.$f)) {
                echo
                    '<div class="foldpadd">
                        <div class="row file foldbg" rel="'.$dir.$f.'">'.$f.'</div>
                    </div>';
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
