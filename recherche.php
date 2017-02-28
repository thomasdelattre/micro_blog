<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');
$mpp=4;

//si l'utilisateur est connecté, cette div lui permet de publier un message
if($pseudo!=""){ ?>
<div class="row">              
	<form method="post" action="message.php">
		<div class="col-sm-10">  
			<div class="form-group">
				<textarea id="message" name="message" class="form-control" placeholder="Message"><?php 
					if(isset($_GET['id']) && !empty($_GET['id'])){
						$query='SELECT contenu FROM messages WHERE id='.$_GET['id'];
						$stmt=$pdo->query($query);
						while($data=$stmt->fetch()){
							echo $data['contenu'];
						}
					}
					?></textarea>
					<input type="hidden" id="id" name="id" value="<?php 
					if(isset($_GET['id']) && !empty($_GET['id'])){
						echo $_GET['id'];
					}
					?>"></input>
				</div>
			</div>
			
			<div class="col-sm-2">
				
				<button type="submit"  class="btn btn-success btn-lg">Envoyer</button>
				
			</div>   

		</form>
	</div>
	<?php }  

//Requete permettant de recuperer les messages pour le contenu recherché, et d'en afficher que 4 par page
if(isset($_GET['page']) && isset($_GET['contenu'])){
    	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date 
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	WHERE contenu LIKE "%'.$_GET['contenu'].'%"
	OR pseudo LIKE "%'.$_GET['contenu'].'%"
	ORDER BY date DESC 
	LIMIT '.($_GET['page']*$mpp-$mpp).','.$mpp;
}
else if(!isset($_GET['page']) && isset($_GET['contenu'])){
    	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date 
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	WHERE contenu LIKE "%'.$_GET['contenu'].'%"
	OR pseudo LIKE "%'.$_GET['contenu'].'%"
	ORDER BY date DESC LIMIT 0,'.$mpp;
}
else if(isset($_GET['page'])){
	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date 
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	ORDER BY date DESC 
	LIMIT '.($_GET['page']*$mpp-$mpp).','.$mpp;
}
else{
	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date 
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	ORDER BY date DESC LIMIT 0,'.$mpp;
}
$stmt = $pdo->query($query);

	//boucle qui affiche le contenu, la date et le pseudo des messages récupérée dans la requete
while ($data = $stmt->fetch()) {
	?>

	<blockquote>
		<?= $data['contenu'] ?>
		<br/>
		<?= date("d/m/Y H:i:s", $data['date']) ?>
		<br/>
		<?= $data['pseudo'] ?>
		<br/>
		<!-- Si le pseudo de l'utilisateur connecté correspond au pseudo du message, il a la possibilité de le modifier ou de le supprimer -->
		<?php if($pseudo==$data['pseudo']){ ?>
			<a role="button" class="btn btn-info btn-default " href="index.php?id=<?=$data['idMessage']; ?>">Modifier</a>
			<a role="button" class="btn btn-danger btn-default" href="sup_message.php?id=<?=$data['idMessage']; ?>">Supprimer</a>
		<?php } ?>
	</blockquote>
<?php
}
?>
<!-- Div contenant la pagination-->
<div class="col-md-offset-4">
	<nav aria-label="Page navigation">
		<ul class="pagination pagination-lg ">

<!-- Si l'utilisateur n'est pas sur la premiere page, affiche le bouton de page precedente-->
			<?php if(isset($_GET['page']) && $_GET['page']!=1){ ?>
			<li>
				<a href="recherche.php?contenu=<?= $_GET['contenu']?>&amp;page=<?php echo $_GET['page']-1 ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<?php } ?>


			<?php 
			//on recupere le nombre de message afin de calculer le nombre de pages

			$query = 'SELECT count(id) AS nbreId FROM messages WHERE contenu LIKE "%'.$_GET['contenu'].'%"'; 
			$stmt=$pdo->query($query);
			while ($data = $stmt->fetch()) {
				$nbreMessages=$data['nbreId'];
			}

			$nbrePages=($nbreMessages) ? ceil($nbreMessages/$mpp) : 1;

			//on crée un bouton pour chaque page présente
			for($i=0;$i<$nbrePages;$i++){
				?>
				<li><a href="recherche.php?contenu=<?= $_GET['contenu']?>&amp;page=<?php echo $i+1 ?>">  <?=$i+1 ?>   </a></li>
				<?php } ?>
				<!-- Si l'utilisateur n'est pas sur la derniere page, affiche le bouton de page suivante -->

				<?php if(!isset($_GET['page']) || $_GET['page']<$nbrePages){ 
					if($nbreMessages>$mpp){?>
					<li>
					<!-- balise a du bouton suivant qui renvoie a la page 2 si le numero de page n'est pas encore defini, et a la page suivante si le numero de page est defini -->
						<a href="recherche.php?contenu=<?= $_GET['contenu']?>&amp;page=<?php 
						if(isset($_GET['page']) && $_GET['page']!=1){
							echo $_GET['page']+1;
						}else{
							echo 2;
						} ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				<?php } } ?>
			</ul>
		</nav>
	</div>

	<?php include('includes/bas.inc.php'); ?>

