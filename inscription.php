<?php
include('includes/connexion.inc.php');

$execInsert=true;

//requete permettant de vérifier si le pseudo ou l'email de l'utilisateur souhaitant s'inscrire n'est pas déja utilisé
$query='SELECT pseudo, email FROM utilisateurs';
$stmt=$pdo->query($query);
while($data=$stmt->fetch()){
	if($data['pseudo']==$_POST['pseudo']){
		//variable servant à ne pas executer la requete d'insertion de l'utilisateur si le pseudo est deja utilisé
		$execInsert=false;
		include('includes/haut.inc.php');
		?>
		<!-- On signale à l'utilisateur que son pseudo est deja utilisé-->
		<div style="text-align: center;">
			<p class="panel" style="font-size: 2em">Le pseudo <?= $_POST['pseudo'] ?> est d&eacute;j&agrave; utilis&eacute;</p>
			<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
		</div>
		<?php
		include('includes/bas.inc.php');
	}
	if($data['email']==$_POST['email']){
		//variable servant à ne pas executer la requete d'insertion de l'utilisateur si l'email est deja utilisé
		$execInsert=false;
		include('includes/haut.inc.php');
		?>

		<!-- On signale à l'utilisateur que son email est deja utilisé-->
		<div style="text-align: center;">
			<p class="panel" style="font-size: 2em">L'adresse email <?= $_POST['email'] ?> est d&eacute;j&agrave; utilis&eacute;e</p>
			<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
		</div>
		<?php
		include('includes/bas.inc.php');
	}
}

//si le pseudo et l'email sont libres alors on effectue la requete d'insertion de l'utilisateur dans la base de données
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

	<!-- on indique a l'utilisateur que tout s'est bien passé et qu'il est maintenant inscrit -->
	<div style="text-align: center;">
		<p class="panel" style="font-size: 2em">Vous &ecirc;tes maintenant inscrit(e)</p>
		<a class="btn btn-success"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
	</div>
	<?php
	include('includes/bas.inc.php');
}
?>