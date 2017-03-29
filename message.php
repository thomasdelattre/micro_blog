<?php
include('includes/connexion.inc.php');

//on vérifie si l'utilisateur est encore connecté pour inserer son message dans la base de donnée
if($pseudo!=""){
	//on recupere l'id de l'utilisateur pour le mettre dans la requete INSERT
	$query='SELECT id FROM utilisateurs WHERE pseudo="'.$pseudo.'"';
	$stmt = $pdo->query($query);
	while ($data = $stmt->fetch()) {
		$id_utilisateurs=$data['id'];
	}

if (isset($_POST['message']) && !empty($_POST['message'])) {
   
    
    
	//Si l'id n'existe pas ou si l'id est vide, on fait une requete INSERT , sinon on fait un update (si l'utilisateur a appuyé sur le bouton modifier)
	if(!isset($_POST['id']) || empty($_POST['id'])){
		$query = 'INSERT INTO messages (contenu, date, id_utilisateurs) VALUES (:contenu, UNIX_TIMESTAMP(),:id_utilisateurs)';
		$prep = $pdo->prepare($query);
	}
	else{
		$query = 'UPDATE messages set contenu=(:contenu), date= UNIX_TIMESTAMP(), id_utilisateurs=(:id_utilisateurs) WHERE id=(:id)';
		$prep = $pdo->prepare($query);
		$prep->bindValue(':id', $_POST['id']);
	}
	$prep->bindValue(':id_utilisateurs', $id_utilisateurs);
	$prep->bindValue(':contenu', $_POST['message']);
	
	$prep->execute();
    
}
//on redirige l'utilisateur sur la page index.php
header('Location:index.php');
}
//si le cookie a expiré, on indique a l'utilisateur qu'il n'est plus connecté 
else{
	
	include('includes/haut.inc.php');
	?>

	<div style="text-align: center;">
		<p class="panel" style="font-size: 2em">Vous avez &eacute;t&eacute; d&eacute;connect&eacute;(e)</p>
		<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
	</div>
	<?php
	include('includes/bas.inc.php');
}
?>