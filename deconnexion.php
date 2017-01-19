<?php 
//suppression du cookie de connexion
setcookie('cookieBlog', '', time()-1);
header('Location:index.php');
?>