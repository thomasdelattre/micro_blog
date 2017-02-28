<?php
/* Smarty version 3.1.30, created on 2017-01-31 16:06:17
  from "C:\Program Files (x86)\EasyPHP-Devserver-16.1\eds-www\micro_blog - Copie\includes\connexion.inc.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5890a7e9336db7_68911149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '571a7eef19e2d570ba4b80596ebed78d1452a936' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-16.1\\eds-www\\micro_blog - Copie\\includes\\connexion.inc.php',
      1 => 1485874186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5890a7e9336db7_68911149 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>//connexion a la bdd
$pdo = new PDO('mysql:host=127.0.0.1;dbname=micro_blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once('libs/Smarty.class.php');
$smarty = new Smarty();


//si le cookie existe, on récupére les informations de l'utilisateurs en fonction de son sid et on crée la variable $pseudo
if(isset($_COOKIE['cookieBlog'])){
	$query='SELECT * FROM utilisateurs WHERE sid=:sid';
	$prep= $pdo->prepare($query);
	$prep->bindValue(':sid', $_COOKIE['cookieBlog']);
	$prep->execute();
	$count=$prep->rowCount();
	if($count!=0){
		while ($data = $prep->fetch()) {
			$smarty->assign('pseudo', $data['pseudo']);
		}
	}
	else{
		$smarty->assign('pseudo', "");
	}
}
//Si le cookie n'existe pas, on crée la variable $pseudo vide
else{
	$smarty->assign('pseudo', "");
}
<?php echo '?>';
}
}
