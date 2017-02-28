<?php
/* Smarty version 3.1.30, created on 2017-02-28 14:29:10
  from "C:\Program Files (x86)\EasyPHP-Devserver-16.1\eds-www\micro_blog - Copie\connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b57b26e2fe87_21558357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f411b24d6257e90a25ead242cf6bd8c6986753a6' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-16.1\\eds-www\\micro_blog - Copie\\connexion.tpl',
      1 => 1488288532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:includes/haut.tpl' => 1,
    'file:includes/bas.tpl' => 1,
  ),
),false)) {
function content_58b57b26e2fe87_21558357 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:includes/haut.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if ($_smarty_tpl->tpl_vars['requetePassee']->value == false) {?>
<div style="text-align: center;">
		<p class="panel" style="font-size: 2em">Email ou mot de passe incorrect</p>
		<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
</div>
<?php }
$_smarty_tpl->_subTemplateRender("file:includes/bas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
