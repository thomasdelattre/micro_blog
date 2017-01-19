<?php
include('includes/connexion.inc.php');

$execInsert=true;

$query='SELECT pseudo, email FROM utilisateurs';
$stmt=$pdo->query($query);
while($data=$stmt->fetch()){
	if($data['pseudo']==$_POST['pseudo']){
		$execInsert=false;
		include('includes/haut.inc.php');
		?>

		<div style="text-align: center;">
			<p class="panel" style="font-size: 2em">Le pseudo <?= $_POST['pseudo'] ?> est d&eacute;j&agrave; utilis&eacute;</p>
			<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
		</div>
		<?php
		include('includes/bas.inc.php');
	}
	if($data['email']==$_POST['email']){
		$execInsert=false;
		include('includes/haut.inc.php');
		?>

		<div style="text-align: center;">
			<p class="panel" style="font-size: 2em">L'adresse email <?= $_POST['email'] ?> est d&eacute;j&agrave; utilis&eacute;e</p>
			<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
		</div>
		<?php
		include('includes/bas.inc.php');
	}
}

if($execInsert==true){
	$query = 'INSERT INTO utilisateurs (nom, prenom, email, mdp, pseudo) VALUES (:nom, :prenom, :email, :mdp, :pseudo)';
	$prep = $pdo->prepare($query);
	$prep->bindValue(':nom', $_POST['nom']);
	$prep->bindValue(':prenom', $_POST['prenom']);
	$prep->bindValue(':email', $_POST['email']);
	$prep->bindValue(':mdp', md5($_POST['mdp']));
	$prep->bindValue(':pseudo', $_POST['pseudo']);
	$prep->execute();

	include('includes/haut.inc.php');
	?>

	<div style="text-align: center;">
		<p class="panel" style="font-size: 2em">Vous &ecirc;tes maintenant inscrit(e)</p>
		<a class="btn btn-success"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
	</div>
	<?php
	include('includes/bas.inc.php');
}
?>