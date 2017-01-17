
<?php
include('includes/connexion.inc.php');


$query = 'SELECT pseudo FROM utilisateurs WHERE email=:email AND mdp=:mdp';
$prep = $pdo->prepare($query);
$prep->bindValue(':email', $_POST['email']);
$prep->bindValue(':mdp', md5($_POST['mdp']));
$prep->execute();
$count=$prep->rowCount();

if($count!=0){
	$sid=md5($_POST['email'].$_POST['mdp'].time());
	setcookie("cookieBlog", $sid, time()+300);
	$query = 'UPDATE utilisateurs SET sid=:sid WHERE email=:email AND mdp=:mdp';
	$prep= $pdo->prepare($query);
	$prep->bindValue(':sid', $sid);
	$prep->bindValue(':email', $_POST['email']);
	$prep->bindValue(':mdp', md5($_POST['mdp']));
	$prep->execute();
	header('Location:index.php');
}
else{
	include('includes/haut.inc.php');
	?>

	<div style="text-align: center;">
		<p class="panel" style="font-size: 2em">Email ou mot de passe incorrect</p>
		<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
	</div>
	<?php
	include('includes/bas.inc.php');
}
?>