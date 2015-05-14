<?php
//On démarre la session
session_start();
//par défaut la session est fermée
$loginOK = false;

//récupérations des données transmises par l'URL
$Id = $_POST['Id'];
$MdP = $_POST['MdP'];

//on vérifie que les données ne sont pas vides
if(empty($Id))
{
    header('Location: index.php?message=Identifiant non renseigné !');
    exit();
}
if(empty($MdP))
{
    header('Location: index.php?message=Mot de passe non renseigné !');
    exit();
}

$Idmod = "'$Id'";

include('config.php');

//connection à la base de données
$db = mysql_connect(DBHOST, DBUSER, DBPASSWD) or die('Erreur de connexion');
mysql_select_db('Id', $db) or die('Base inexistante');

//requète sur la table et vérification
$sql = "SELECT * FROM principale WHERE Id = $Idmod;";
$query = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

//on vérifie que 1 seul résultat est retourné
$nb = mysql_num_rows($query);
if ( $nb != 1 )
{
    header('Location: index.php?message=utilisateur inconnu ou mot de passe incorrect !');
    exit();
}
else
{
    //on transfère le résultat de la requète pour pouvoir l'utiliser
    $result = mysql_fetch_array($query);
}

//fermeture de la connection à la base
mysql_close();

//on vérifie que le Pwd match et on redirige sur la bonne page
if ( $result['Pwd'] == $MdP )
{
    $loginOK = true;
    $_SESSION['Id'] = $Id;
    header('Location: menu.php');
    exit();
}
else
{
    header('Location: index.php?message=utilisateur inconnu ou mot de passe incorrect !');
    exit();
}
?>
