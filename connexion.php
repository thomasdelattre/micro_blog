
<?php
include('includes/connexion.inc.php');
require_once('libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->assign('pseudo', $pseudo);
//On recherche l'utilisateur grace a son mdp et son email qu'il a entré précedemment 
$query = 'SELECT pseudo FROM utilisateurs WHERE email=:email AND mdp=:mdp';
$prep = $pdo->prepare($query);
$prep->bindValue(':email', $_POST['email']);
$prep->bindValue(':mdp', md5($_POST['mdp']));
$prep->execute();
$count=$prep->rowCount();

//Si il y a une ligne à la requete precedente
if($count!=0){
	//on crée un sid unique composé de l'adresse mail du mdp et de la date
	$sid=md5($_POST['email'].$_POST['mdp'].time());
	//on crée un cookie avec le sid
	setcookie("cookieBlog", $sid, time()+300);
	//On mets le sid dans la base de données 
	$query = 'UPDATE utilisateurs SET sid=:sid WHERE email=:email AND mdp=:mdp';
	$prep= $pdo->prepare($query);
	$prep->bindValue(':sid', $sid);
	$prep->bindValue(':email', $_POST['email']);
	$prep->bindValue(':mdp', md5($_POST['mdp']));
	$prep->execute();
	header('Location:index.php');
}
//Si l'utilisateur n'a pas été trouvé, on lui indique que l'email ou le mot de passe est incorrect
else{
	$smarty->assign('requetePassee', false);
    $smarty->display('connexion.tpl');
}
?>