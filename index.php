<!DOCTYPE html>
<html class="degrade">
	<head>
		<title>Sylvain Nizac</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/global.css" rel="stylesheet" type="text/css" />
        <link href="css/signin.css" rel="stylesheet" type="text/css" />
		<link href="css/footer.css" rel="stylesheet" type="text/css" />
        <!-- affiche une icone avant le nom dans l'onglet -->
        <!-- <link rel="icon" href="../../favicon.ico"> -->
	</head>
	<body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
           <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Welcome!</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="carousel.php">Galerie</a></li>
                    </ul>

                    <form method="post" action="verif.php" class="navbar-form navbar-right">
                        <div class="form-group">
                            <label for="Id" class="sr-only">Identifiant</label>
                            <input type="text" name="Id" class="form-control" placeholder="Identifiant" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="MdP" class="sr-only">Mot de passe</label>
                            <input type="password" name="MdP" class="form-control" placeholder="Mot de passe" required>
                        </div>
                        <button class="btn btn-success" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </nav>
                
        <div class="container margnavbar">
            <div class="blog-header">
                <h1 class="blog-title">The Sylvain's Blog</h1>
                <p class="lead blog-description">Entre blog et notes de version, suivi croisé de ce site et de mon GitHub.</p>
            </div>

            <div class="row">

                <div class="col-sm-8 blog-main">
                    
                    <div class="blog-post">
                        <h2 class="blog-post-title">Tables et Galerie / Galerie de Tables</h2>
                        <p class="blog-post-meta">7 mai 2015 par Sylvain</p>
                        <hr>
                        <p>Mise en ligne de la nouvelle version de la galerie.</p>
                        <p>Le stock de photos n'est pas encore au point mais au moins l'architecture ne devrait plus trop être retouchée.</p>
                        <p>La suite? Je ne sais pas encore. Probablement étoffer les photos.</p>
                    </div><!-- /.blog-post -->

                    <div class="blog-post">
                        <h2 class="blog-post-title">It's alive!</h2>
                        <p class="blog-post-meta">1er mai 2015 par Sylvain</p>
                        <hr>
                        <p>Depuis quelques temps que l'idée trottait.</p>
                        <p>Voila c'est fait une nouvelle page d'accueil avec des notes.</p>
                        <p>A chaque fois qu'un changement aura lieu j'en ferais une petite note.</p>
                    </div><!-- /.blog-post -->

                    <nav>
                        <ul class="pager">
                            <li><a href="#">Note plus ancienne</a></li>
                            <li><a href="#">Note plus récente</a></li>
                        </ul>
                    </nav>

                </div><!-- /.blog-main -->

                <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>About</h4>
                        <p>Je n'entend pas faire ce ce site une référence de quoi que ce soit mais juste un laboratoire pour mes tests.</p>
                    </div>
                    <div class="sidebar-module">
                        <h4>Archives</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">Mai 2015</a></li>
                        </ol>
                    </div>
                    <div class="sidebar-module">
                        <h4>Ailleurs</h4>
                        <ol class="list-unstyled">
                            <li><a href="https://github.com/sylvainnizac">GitHub</a></li>
                        </ol>
                    </div>
                </div><!-- /.blog-sidebar -->

            </div><!-- /.row -->
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">V2.5</p>
            </div>
            <div class="container">
                <p class="text-muted">
                    <?php
                        if( empty($_GET['message']) )
                        {
                        }
                        else
                        {
                            $mess = $_GET['message'];
                            print("$mess");
                        }
                    ?>
                </p>
            </div>
        </footer>
	</body>
</html>
