<?php
/* Smarty version 3.1.30, created on 2017-01-31 15:32:20
  from "C:\Program Files (x86)\EasyPHP-Devserver-16.1\eds-www\micro_blog\testSmarty.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58909ff496a171_50657238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0aaff9111fbeccb6c7372eaf849e392743412de' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-16.1\\eds-www\\micro_blog\\testSmarty.tpl',
      1 => 1485873139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58909ff496a171_50657238 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div ><?php echo Smarty::SMARTY_VERSION;?>
</div>
<div>Bonjour <?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>
 comment vas tu en ce <?php echo $_smarty_tpl->tpl_vars['jour']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['mois']->value;?>
</div><?php }
}
