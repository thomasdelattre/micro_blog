<?php
/* Smarty version 3.1.30, created on 2017-04-22 15:34:15
  from "C:\Program Files (x86)\EasyPHP-Devserver-16.1\eds-www\micro_blog - Copie\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fb5bd727abc2_01171133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4e553e198628bf1fb64440fb05be7b5e21de115' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-Devserver-16.1\\eds-www\\micro_blog - Copie\\index.tpl',
      1 => 1492868053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:includes/haut.tpl' => 1,
    'file:includes/bas.tpl' => 1,
  ),
),false)) {
function content_58fb5bd727abc2_01171133 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:includes/haut.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php if ($_smarty_tpl->tpl_vars['pseudo']->value != '') {?>
<div class="row">              
	<form method="post" action="message.php">
		<div class="col-sm-10">  
			<div class="form-group">
				<textarea id="message" name="message" class="form-control" placeholder="Message"><?php if (isset($_GET['id']) && $_GET['id'] != '') {
echo $_smarty_tpl->tpl_vars['contenu']->value;
}?></textarea>
				<input type="hidden" id="id" name="id" value="<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
echo $_smarty_tpl->tpl_vars['id']->value;
}?>"/>		
			</div>
		</div>

		<div class="col-sm-2">
			<button type="submit"  class="btn btn-success btn-lg">Envoyer</button>
		</div>   

	</form>
</div>
<div class="row apercu hidden" id="apercu" >              
    <form>
        <div class="col-sm-10">  
            <div class="form-group">            
               <p id="apercuexpreg" name="apercuexpreg" class="form-control"></p>
               <input type="hidden" id="apercu1" name="apercu1" value="<?php echo $_smarty_tpl->tpl_vars['getID']->value;?>
" />
            </div>
        </div>
                       
    </form>
</div>
<?php }?>

<?php $_smarty_tpl->_assignInScope('u', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_contenu']->value, 'contenu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contenu']->value) {
?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'var', null);
echo $_smarty_tpl->tpl_vars['u']->value++;
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

<div style="display:flex;flex-direction:row">
    <a style="text-decoration:none;" class="glyphicon glyphicon-thumbs-up voteup vote" data-id="<?php echo $_smarty_tpl->tpl_vars['contenu']->value['idMessage'];?>
" data-u="<?php echo $_smarty_tpl->tpl_vars['u']->value;?>
"></a>
    <span id="spanVote<?php echo $_smarty_tpl->tpl_vars['u']->value;?>
" class="vote"><?php echo $_smarty_tpl->tpl_vars['contenu']->value['votes'];?>
</span>
    <blockquote>
        <?php echo $_smarty_tpl->tpl_vars['contenu']->value['contenu'];?>
s
        <br/>
        <?php echo $_smarty_tpl->tpl_vars['contenu']->value['date'];?>

        <br/>
        <?php echo $_smarty_tpl->tpl_vars['contenu']->value['pseudo'];?>

        <br/>
        <!-- Si le pseudo de l'utilisateur connecté correspond au pseudo du message, il a la possibilité de le modifier ou de le supprimer -->
        <?php if ($_smarty_tpl->tpl_vars['pseudo']->value == $_smarty_tpl->tpl_vars['contenu']->value['pseudo']) {?>
            <a role="button" class="btn btn-info btn-default " href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['contenu']->value['idMessage'];?>
">Modifier</a>
            <a role="button" class="btn btn-danger btn-default" href="sup_message.php?id=<?php echo $_smarty_tpl->tpl_vars['contenu']->value['idMessage'];?>
">Supprimer</a>
        <?php }?>
    </blockquote>
</div>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<?php if ($_smarty_tpl->tpl_vars['nbreMessages']->value != 0) {?>
<!-- Div contenant la pagination-->
<div class="col-md-offset-4">
	<nav aria-label="Page navigation">
		<ul class="pagination pagination-lg ">

			<!-- Si l'utilisateur n'est pas sur la premiere page, affiche le bouton de page precedente-->
			<?php if (isset($_GET['page']) && $_GET['page'] != 1) {?>
			<li>
				<a href="index.php?page=<?php echo $_GET['page']-1;
if (isset($_GET['contenu'])) {?>&amp;contenu=<?php echo $_GET['contenu'];
}?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<?php }?>

			<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nbrePages']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['nbrePages']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<li>
                <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value+1;
if (isset($_GET['contenu'])) {?>&amp;contenu=<?php echo $_GET['contenu'];
}?>"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</a>
            </li>
			<?php }
}
?>


			<!-- Si l'utilisateur n'est pas sur la derniere page, affiche le bouton de page suivante -->
			<?php if (!isset($_GET['page']) || $_GET['page'] < $_smarty_tpl->tpl_vars['nbrePages']->value) {?>
			     <?php if ($_smarty_tpl->tpl_vars['nbreMessages']->value > $_smarty_tpl->tpl_vars['mpp']->value) {?>
			         <li>
				        <!-- balise a du bouton suivant qui renvoie a la page 2 si le numero de page n'est pas encore defini, et a la page suivante si le numero de page est defini -->
                        <a href="index.php?page=<?php if (isset($_GET['page']) && $_GET['page'] != 1) {
echo $_GET['page']+1;
} else {
echo 2;
}
if (isset($_GET['contenu'])) {?>&amp;contenu=<?php echo $_GET['contenu'];
}?>" aria-label="Next">
		                      <span aria-hidden="true">&raquo;</span>
	                   </a>
                    </li>
                <?php }?>
            <?php }?>
        </ul>
    </nav>
</div>
<?php }?>



<?php $_smarty_tpl->_subTemplateRender("file:includes/bas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
