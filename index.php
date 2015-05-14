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
		<div id="global">
			<div id="contenu">
                
				<img src="images/procrastinators_association.gif" class="logoPrincipal" alt="procrastinators logo" />
                
                <center>
                <form method="post" action="verif.php">
                    <a>Identifiant : </a><input type="text" name="Id" size="12"><br>
                    <a>Mot de passe : </a><input type="password" name="MdP" size="12">
                    <input type="submit" value="OK">
                </form>
                </center>
			</div>
		</div>
        <?php
            if( empty($_GET['message']) )
            {
            }
            else
            {
                $mess = $_GET['message'];
                print("<a><center>$mess</center></a>");
            }
        ?>
	</body>
</html>
