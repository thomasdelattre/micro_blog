<?php
include('includes/connexion.inc.php');
//requete servant à supprimer un message par rapport à son id
$querySupp='DELETE FROM messages WHERE id='.$_GET['id'];
$prep = $pdo->prepare($querySupp);
$prep->execute();
header('Location:index.php');
?>