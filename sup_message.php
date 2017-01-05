<?php
include('includes/connexion.inc.php');
$querySupp='DELETE FROM messages WHERE id='.$_GET['id'];
$prep = $pdo->prepare($querySupp);
$prep->execute();
header('Location:index.php');
?>