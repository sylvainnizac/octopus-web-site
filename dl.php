<?php 
// ce script permet de télécharger l'élément envoyé en argument
// La fonction end(), permet de récupérer le dernier objet d'un tableau
// http://cz1.php.net/function.end

$file = explode("/", $_GET['f']);
 
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename(end($file)));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($_GET['f']));
ob_clean();
flush();
 
readfile($_GET['f']);
exit;
?>
