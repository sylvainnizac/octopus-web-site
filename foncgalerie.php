<?php

include('config.php');

FUNCTION navbar(){
    echo '<li><a href="#about">Hacker\'s help</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Nomades<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      
                    <form id="AllN" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="1"/>
                    </form>
                    <li><a onclick=document.getElementById("AllN").submit()>Toutes</a></li>
                    
                    <li class="divider"></li>
                    <li class="dropdown-header">Corregidor</li>
                    
                    <form id="Corr" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="3"/>
                    </form>
                    <li><a onclick=document.getElementById("Corr").submit()>Toutes</a></li>
                    
                    <li><a href="#">Troupes</a></li>
                    <li><a href="#">Personnages</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Bakunin</li>
                    <form id="Bak" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="2"/>
                    </form>
                    <li><a onclick=document.getElementById("Bak").submit()>Toutes</a></li>
                    <li><a href="#">Troupes</a></li>
                    <li><a href="#">Personnages</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Tunguska</li>
                    <form id="Tun" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="4"/>
                    </form>
                    <li><a onclick=document.getElementById("Tun").submit()>Toutes</a></li>
                    <li><a href="#">Troupes</a></li>
                    <li><a href="#">Personnages</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ariadna<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      
                    <form id="AllA" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="5"/>
                    </form>
                    <li><a onclick=document.getElementById("AllA").submit()>Toutes</a></li>

                    <li class="divider"></li>
                    <li><a href="#">Kazaks</a></li>
                    <li><a href="#">USAriadna</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Mérovingie</li>
                    
                    <form id="Mero" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="7"/>
                    </form>
                    <li><a onclick=document.getElementById("Mero").submit()>Toutes</a></li>
                    
                    <li><a href="#">Troupes</a></li>
                    <li><a href="#">Personnages</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Calédonie</li>
                    
                    <form id="Cale" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="6"/>
                    </form>
                    <li><a onclick=document.getElementById("Cale").submit()>Toutes</a></li>
                    
                    <li><a href="#">Troupes</a></li>
                    <li><a href="#">Personnages</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Yu-Jing<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      
                    <form id="AllY" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="8"/>
                    </form>
                    <li><a onclick=document.getElementById("AllY").submit()>Toutes</a></li>

                    <li class="divider"></li>
                    <li><a href="#">Imperial Service</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">JSA</li>
                    
                    <form id="JSA" action="galerie.php" method="post">
                        <input type="hidden" name="army" value="9"/>
                    </form>
                    <li><a onclick=document.getElementById("JSA").submit()>Toutes</a></li>
                    
                    <li><a href="#">Troupes</a></li>
                    <li><a href="#">Personnages</a></li>
                  </ul>
                </li>';
}

FUNCTION entete($army){
    //connection à la base de données
    $db = mysql_connect(DBHOST, DBUSER, DBPASSWD) or die('Erreur de connexion');
    mysql_select_db('Infinity', $db) or die('Base inexistante');

    // préparation et envoie de la requête pour récupérer les armée demandées
    $fac = $army;
    $sql = "SELECT Army FROM armee WHERE Ref = $fac;";
    $query = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $result = mysql_fetch_array($query);
            
    echo '
        <div class="col-md-2">
            <img class="img-circle" src="images/Logos/'.$result['Army'].'.png" alt="Generic placeholder image" style="width: 100px; height: 100px;">
        </div>
        <div class="col-md-10 titregalerie">
            <h2>'.$result['Army'].'</h2>
        </div>';
        
    mysql_close($db);
            
}

FUNCTION recovarmy($army){
    //connection à la base de données
    $db = mysql_connect(DBHOST, DBUSER, DBPASSWD) or die('Erreur de connexion');
    mysql_select_db('Infinity', $db) or die('Base inexistante');

    // préparation et envoie de la requête pour récupérer les armée demandées
    $fac = $army;
    $sql = "SELECT * FROM armee WHERE Faction = $fac;";
    $query = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    
    $nb = mysql_num_rows($query);

    //on parcour les résultats obtenus pour le remplissage de la colonne de gauche
    for ($i = 0; $i < $nb; $i++) {

        echo '<div class=tree>';

        //on transfère le résultat de la requète pour pouvoir l'utiliser
        $result = mysql_fetch_array($query);
        echo '<div class="row">'.$result['Army'].'</div>';

        //préparation et envoi de la requête pour récupérer les figurines demandées
        $pos = $result['Ref'];
        $sql = "SELECT Name FROM figs WHERE Faction = $pos ORDER BY Name;";
        $querymini = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        $nbmini = mysql_num_rows($querymini);

        echo '<ul>';

        for ($j = 0; $j < $nbmini; $j++) {
        	$resultmini = mysql_fetch_array($querymini);
        	echo '<div class="row">'.$resultmini['Name'].'</div>';
    	}

        echo '</ul></div>';

    }
    
    mysql_close($db);
}

FUNCTION recovsecto($army){
    // connection à la base de données
    $db = mysql_connect(DBHOST, DBUSER, DBPASSWD) or die('Erreur de connexion');
    mysql_select_db('Infinity', $db) or die('Base inexistante');

    // préparation et envoie de la requête pour récupérer les armée demandées
    $fac = $army;
    $sql = "SELECT * FROM armee WHERE Ref = $fac;";
    $query = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    
    echo '<div class=tree>';

    // on transfère le résultat de la requète pour pouvoir l'utiliser
    $result = mysql_fetch_array($query);
    $resarm = $result['Faction'];
    
    echo '<div class="row">Troupes</div>';
    
    //préparation et envoi de la requête pour récupérer les figurines demandées
    $sql = "SELECT Name FROM figs WHERE Faction = $fac AND Special = 0 ORDER BY Name;";
    $querymini = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $nbmini = mysql_num_rows($querymini);

    echo '<ul>';

    for ($j = 0; $j < $nbmini; $j++) {
       	$resultmini = mysql_fetch_array($querymini);
       	echo '<div class="row">'.$resultmini['Name'].'</div>';
    }

    echo '</ul>';
    
    echo '<div class="row">Drones</div>';
    
    //préparation et envoi de la requête pour récupérer les figurines demandées
    $sql = "SELECT Name FROM figs WHERE (Faction = $fac AND Special = 2) OR (Faction = $resarm AND Special = 2) ORDER BY Name;";
    $querymini = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $nbmini = mysql_num_rows($querymini);

    echo '<ul>';

    for ($j = 0; $j < $nbmini; $j++) {
       	$resultmini = mysql_fetch_array($querymini);
       	echo '<div class="row">'.$resultmini['Name'].'</div>';
    }

    echo '</ul>';
    
    echo '<div class="row">Personnages</div>';
    
    //préparation et envoi de la requête pour récupérer les figurines demandées
    $sql = "SELECT Name FROM figs WHERE Faction = $fac AND Special = 1 ORDER BY Name;";
    $querymini = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $nbmini = mysql_num_rows($querymini);

    echo '<ul>';

    for ($j = 0; $j < $nbmini; $j++) {
       	$resultmini = mysql_fetch_array($querymini);
       	echo '<div class="row">'.$resultmini['Name'].'</div>';
    }

    echo '</ul></div>';
    
    mysql_close($db);
}

FUNCTION recovphotofac($army){
    $fac = $army;
    // connection à la base de données
    $db = mysql_connect(DBHOST, DBUSER, DBPASSWD) or die('Erreur de connexion');
    mysql_select_db('Infinity', $db) or die('Base inexistante');

    // préparation et envoie de la requête pour récupérer les photos demandées
    $sql = "SELECT p.NomFig, a.Army, b.Army as Secto FROM Photos p JOIN armee a ON p.Faction = a.Ref JOIN armee b ON p.Secto = b.Ref WHERE p.Faction = $fac;";
    $query = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $nb = mysql_num_rows($query);
                        
    //on parcour les résultats obtenus
    for ($i = 0; $i < $nb; $i++) {
        //limitation à 3 photos par ligne partie 1
        if ($i % 3 == 0 OR $i == 0){
            echo '<div class="row">';
        }

        //on transfère le résultat de la requète pour pouvoir l'utiliser
        $result = mysql_fetch_array($query);
        
        // affichage de la photo
        echo'
            <div class="col-md-4 thumb">
                <a class="thumbnail cadre" href="#">
                    <img class="img-responsive miniature" src="images/galerie/'.$result['Army'].'/'.$result['Secto'].'/'.$result['NomFig'].'" alt="Generic placeholder image">
                </a>
            </div>';
        
        //limitation à 3 photos par ligne partie 2
        if (($i + 1) % 3 == 0){
            echo '</div>';
        }
    }
    mysql_close($db);
}

FUNCTION recovphotosecto($army){
    $secto = $army;
    // connection à la base de données
    $db = mysql_connect(DBHOST, DBUSER, DBPASSWD) or die('Erreur de connexion');
    mysql_select_db('Infinity', $db) or die('Base inexistante');

    // préparation et envoie de la requête pour récupérer les photos demandées
    $sql = "SELECT p.NomFig, a.Army, b.Army as Secto FROM Photos p JOIN armee a ON p.Faction = a.Ref JOIN armee b ON p.Secto = b.Ref WHERE p.Secto = $secto;";
    $query = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $nb = mysql_num_rows($query);
                        
    //on parcour les résultats obtenus
    for ($i = 0; $i < $nb; $i++) {
        //limitation à 3 photos par ligne partie 1
        if ($i % 3 == 0 OR $i == 0){
            echo '<div class="row">';
        }

        //on transfère le résultat de la requète pour pouvoir l'utiliser
        $result = mysql_fetch_array($query);
        
        // affichage de la photo
        echo'
            <div class="col-md-4 thumb">
                <a class="thumbnail cadre" href="#">
                    <img class="img-responsive miniature" src="images/galerie/'.$result['Army'].'/'.$result['Secto'].'/'.$result['NomFig'].'" alt="Generic placeholder image">
                </a>
            </div>';
        
        //limitation à 3 photos par ligne partie 2
        if (($i + 1) % 3 == 0){
            echo '</div>';
        }
    }
    mysql_close($db);
}
?>
