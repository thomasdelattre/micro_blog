
<?php
include('includes/connexion.inc.php');

// NOTE: Smarty has a capital 'S'
require_once('libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->assign('pseudo', $pseudo);
$smarty->display('testSmarty.tpl');

?>


