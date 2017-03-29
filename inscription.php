<?php
include('includes/connexion.inc.php');
require_once('libs/Smarty.class.php');
	$smarty = new Smarty();
	$smarty->assign('pseudo', $pseudo);
$execInsert=true;

//requete permettant de vérifier si le pseudo ou l'email de l'utilisateur souhaitant s'inscrire n'est pas déja utilisé
$query='SELECT pseudo, email FROM utilisateurs';
$stmt=$pdo->query($query);
while($data=$stmt->fetch()){
    
	if($data['pseudo']==$_POST['pseudo']){
		//variable servant à ne pas executer la requete d'insertion de l'utilisateur si le pseudo est deja utilisé
		$execInsert=false;
		$smarty->assign('pseudoInvalide', $data['pseudo']);
	}
	if($data['email']==$_POST['email']){
		//variable servant à ne pas executer la requete d'insertion de l'utilisateur si l'email est deja utilisé
		$execInsert=false;
		$smarty->assign('emailInvalide', $data['email']);
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
	$smarty->assign('requetePasse', true);
	
}

$smarty->display('inscription.tpl');
?>