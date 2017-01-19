<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Micro blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php">Micro blog</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <?php
                            if($pseudo==""){
                                ?>

                                <a id="buttonConnexion" data-toggle="modal" data-target="#modalConnexion">Connexion</a>
                            </li>
                            <li>
                                <a id="buttonInscription" data-toggle="modal" data-target="#modalInscription">Inscription</a>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                            <a id="buttonConnexion" href="deconnexion.php">Deconnexion - <?= $pseudo ?></a>
                        </li>
                        <?php
                    }
                    ?>
                    <li>

                        <form action="recherche.php" method="get" style="display:flex;margin-top:7px;margin-left: 20px;">
                            <input type="text" style="border-radius:10px 0 0 10px" placeholder="Rechercher" name="contenu" id="schbox" class="form-control">
                            <button class="btn glyphicon glyphicon-search" type="submit" style="border-radius:0 10px 10px 0" ></button>
                        </form>

                    </div>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="intro-text">
                    <span class="name">Le fil</span>
                    <hr class="star-light">
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="modalConnexion" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center;">Connexion</h4>
                    </div>
                    <div class="modal-body" style="text-align: left; font-size: 1.1em">
                        <form action="connexion.php" id="formConnexion" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" id="mdp" class="form-control" name="mdp" placeholder="Mot de passe">
                            </div>
                            <div class="hidden" id="msgErreur">Faux</div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">Connexion</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalInscription" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center;">Inscription</h4>
                    </div>
                    <div class="modal-body" style="text-align: left; font-size: 1.1em">
                        <form action="inscription.php" id="formInscription" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" id="nom" class="form-control" name="nom" required placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pr&eacute;nom</label>
                                <input type="text" id="prenom" class="form-control" name="prenom" required placeholder="Prenom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pseudo</label>
                                <input type="text" id="pseudo" class="form-control" name="pseudo" required placeholder="Pseudo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" id="email" class="form-control" name="email" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" id="mdp" class="form-control" name="mdp" required placeholder="Mot de passe">
                            </div>
                            <div class="hidden" id="msgErreur">Faux</div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">S'inscrire</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>

            </div>
        </div>