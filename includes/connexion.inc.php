<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=micro_blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query='SELECT * FROM utilisateurs WHERE sid=:sid';
$prep= $pdo->prepare($query);
$prep->bindValue(':sid', $_COOKIE['cookieBlog']);
$prep->execute();
$count=$prep->rowCount();
if($count!=0){
	while ($data = $prep->fetch()) {
		$pseudo=$data['pseudo'];
	}
}
else{
	$pseudo="";
}
?>