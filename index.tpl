{include file='includes/haut.tpl'}


{if $pseudo neq ""}
<div class="row">              
	<form method="post" action="message.php">
		<div class="col-sm-10">  
			<div class="form-group">
				<textarea id="message" name="message" class="form-control" placeholder="Message">{if isset($smarty.get.id) && $smarty.get.id ne ''}{$contenu}{/if}</textarea>
				<input type="hidden" id="id" name="id" value="{if isset($smarty.get.id) && !empty($smarty.get.id)}{$id}{/if}"/>		
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
               <input type="hidden" id="apercu1" name="apercu1" value="{$getID}" />
            </div>
        </div>
                       
    </form>
</div>
{/if}

{$u=0}
{foreach from=$list_contenu item=contenu}

{capture assign=var}{$u++}{/capture}
<div style="display:flex;flex-direction:row">
    <a style="text-decoration:none;" class="glyphicon glyphicon-thumbs-up voteup vote" data-id="{$contenu.idMessage}" data-u="{$u}"></a>
    <span id="spanVote{$u}" class="vote">{$contenu.votes}</span>
    <blockquote>
        {$contenu.contenu}s
        <br/>
        {$contenu.date}
        <br/>
        {$contenu.pseudo}
        <br/>
        <!-- Si le pseudo de l'utilisateur connecté correspond au pseudo du message, il a la possibilité de le modifier ou de le supprimer -->
        {if $pseudo eq $contenu.pseudo}
            <a role="button" class="btn btn-info btn-default " href="index.php?id={$contenu.idMessage}">Modifier</a>
            <a role="button" class="btn btn-danger btn-default" href="sup_message.php?id={$contenu.idMessage}">Supprimer</a>
        {/if}
    </blockquote>
</div>

{/foreach}

{if $nbreMessages != 0}
<!-- Div contenant la pagination-->
<div class="col-md-offset-4">
	<nav aria-label="Page navigation">
		<ul class="pagination pagination-lg ">

			<!-- Si l'utilisateur n'est pas sur la premiere page, affiche le bouton de page precedente-->
			{if isset($smarty.get.page) && $smarty.get.page neq 1}
			<li>
				<a href="index.php?page={$smarty.get.page-1}{if isset($smarty.get.contenu)}&amp;contenu={$smarty.get.contenu}{/if}" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			{/if}

			{for $i=0 to $nbrePages-1}
			<li>
                <a href="index.php?page={$i+1}{if isset($smarty.get.contenu)}&amp;contenu={$smarty.get.contenu}{/if}">{$i+1}</a>
            </li>
			{/for}

			<!-- Si l'utilisateur n'est pas sur la derniere page, affiche le bouton de page suivante -->
			{if !isset($smarty.get.page) or $smarty.get.page < $nbrePages}
			     {if $nbreMessages > $mpp}
			         <li>
				        <!-- balise a du bouton suivant qui renvoie a la page 2 si le numero de page n'est pas encore defini, et a la page suivante si le numero de page est defini -->
                        <a href="index.php?page={if isset($smarty.get.page) && $smarty.get.page!=1}{$smarty.get.page+1}{else}{2}{/if}{if isset($smarty.get.contenu)}&amp;contenu={$smarty.get.contenu}{/if}" aria-label="Next">
		                      <span aria-hidden="true">&raquo;</span>
	                   </a>
                    </li>
                {/if}
            {/if}
        </ul>
    </nav>
</div>
{/if}



{include file='includes/bas.tpl'}

