{include file='includes/haut.tpl'}

{if isset($requetePasse)}
{if $requetePasse == true}
<!-- on indique a l'utilisateur que tout s'est bien passé et qu'il est maintenant inscrit -->
<div style="text-align: center;">
	<p class="panel" style="font-size: 2em">Vous &ecirc;tes maintenant inscrit(e)</p>
	<a class="btn btn-success"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
</div>
{/if}
{/if}

{if isset($pseudoInvalide)}
<!-- On signale à l'utilisateur que son pseudo est deja utilisé-->
<div style="text-align: center;">
	<p class="panel" style="font-size: 2em">Le pseudo {$pseudoInvalide} est d&eacute;j&agrave; utilis&eacute;</p>
	<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
</div>
{elseif isset($emailInvalide)}
<!-- On signale à l'utilisateur que son email est deja utilisé-->
<div style="text-align: center;">
	<p class="panel" style="font-size: 2em">L'adresse email {$emailInvalide} est d&eacute;j&agrave; utilis&eacute;e</p>
	<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
</div>
{/if}
{include file='includes/bas.tpl'}