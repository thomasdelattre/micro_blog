{include file='includes/haut.tpl'}

{if $requetePassee==false}
<div style="text-align: center;">
		<p class="panel" style="font-size: 2em">Email ou mot de passe incorrect</p>
		<a class="btn btn-danger"  style="font-size: 1.5em" href="index.php">Retour a l'accueil</a>
</div>
{/if}
{include file='includes/bas.tpl'}