<?php
/* Smarty version 3.1.30, created on 2017-04-22 14:28:34
  from "C:\Program Files (x86)\EasyPHP-Devserver-16.1\eds-www\micro_blog - Copie\includes\haut.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb4c720815d0_67741193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e037a50bf7575e92d072b4f06b92000ce2736031' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-16.1\\eds-www\\micro_blog - Copie\\includes\\haut.tpl',
      1 => 1490804899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb4c720815d0_67741193 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
    <?php echo '<script'; ?>
 type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"><?php echo '</script'; ?>
> 
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
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
                            <!-- Boutons connexion et inscription si l'utilisateur n'est pas connecté et bouton deconnexion s'il est connecté -->
                                 <?php if ($_smarty_tpl->tpl_vars['pseudo']->value == '') {?>
                                <a id="buttonConnexion" data-toggle="modal" data-target="#modalConnexion">Connexion</a>
                            </li>
                            <li>
                                <a id="buttonInscription" data-toggle="modal" data-target="#modalInscription">Inscription</a>
                            </li>
                            <?php } else { ?>
                            <a id="buttonDeconnexion" href="deconnexion.php">Deconnexion - <?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
</a>
                        </li>
                        <?php }?>
                    <!-- Champ permettant de rechercher un message qui envoie à la page recherche.php ou le traitement de la recherche est effectué -->
                    <li>

                        <form action="index.php" method="get" style="display:flex;margin-top:7px;margin-left: 20px;">
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


<section>
    <div class="container">

        <!-- Modal contenant le formulaire de connexion -->
        <div class="modal fade" id="modalConnexion" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Bouton permettant de fermer le modal-->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- Titre du modal-->
                        <h4 class="modal-title" style="text-align: center;">Connexion</h4>
                    </div>
                    <div class="modal-body" style="text-align: left; font-size: 1.1em">
                        <!-- Formulaire renvoyant a la page connexion.php qui permet de se connecter en fonction de l'email et du mdp précisé dans le formulaire -->
                        <form action="connexion.php" id="formConnexion" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" id="mdp" class="form-control" name="mdp" placeholder="Mot de passe">
                            </div>
                            <!-- div qui sera affichée quand l'utilisateur n'aura pas mis d'email ou de mdp -->
                            <div class="hidden" id="msgErreur"></div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">Connexion</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal contenant le formulaire d'inscription -->
        <div class="modal fade" id="modalInscription" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Entete du modal -->
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align: center;">Inscription</h4>
                    </div>
                    <div class="modal-body" style="text-align: left; font-size: 1.1em">
                        <!-- Formulaire d'inscription avec le nom, prénom, pseudo, email et mot de passe -->
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

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">S'inscrire</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>

            </div>
        </div><?php }
}
