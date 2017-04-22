
<?php
include('includes/connexion.inc.php');

// NOTE: Smarty has a capital 'S'
require_once('libs/Smarty.class.php');
$smarty = new Smarty();


if(isset($_GET['id']) && !empty($_GET['id'])){
	$smarty->assign('id', $_GET['id']);
	$query='SELECT contenu FROM messages WHERE id='.$_GET['id'];
	$stmt=$pdo->query($query);
	while($data=$stmt->fetch()){
		$smarty->assign('contenu', $data['contenu']);
	}
}

$mpp=4;

//Requete permettant de recuperer les messages pour le contenu recherché, et d'en afficher que 4 par page
if(isset($_GET['page']) && isset($_GET['contenu'])){
    	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date , votes
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	WHERE contenu LIKE "%'.$_GET['contenu'].'%"
	OR pseudo LIKE "%'.$_GET['contenu'].'%"
	ORDER BY date DESC 
	LIMIT '.($_GET['page']*$mpp-$mpp).','.$mpp;
}
else if(!isset($_GET['page']) && isset($_GET['contenu'])){
    	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date, votes 
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	WHERE contenu LIKE "%'.$_GET['contenu'].'%"
	OR pseudo LIKE "%'.$_GET['contenu'].'%"
	ORDER BY date DESC LIMIT 0,'.$mpp;
}
else if(isset($_GET['page'])){
	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date, votes 
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	ORDER BY date DESC 
	LIMIT '.($_GET['page']*$mpp-$mpp).','.$mpp;
}
else{
	$query = 'SELECT contenu, messages.id AS idMessage, pseudo, date, votes 
	FROM messages 
	INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id 
	ORDER BY date DESC LIMIT 0,'.$mpp;
}
$stmt = $pdo->query($query);

$list_contenu=array();
$i=0;

while($data=$stmt->fetch()){
    $contenu = $data['contenu'];
    $pattern = array('/https?:\/\/[a-zA-Z0-9\-\.]+\.[a-z]+\/?/', '/S*#([\w]+\S*)/', '/[0-9a-z-_.]+\@[0-9a-z.]+\.[a-z]+/');
    $matches= array('<a href="$0">$0</a>', '<a href="index.php?contenu=$1">$0</a>', '<a href="mailto:$0">$0</a>');
	$list_contenu[$i]['contenu'] = preg_replace($pattern, $matches, $contenu);
    $list_contenu[$i]['votes'] = $data['votes'];
	$list_contenu[$i]['idMessage'] = $data['idMessage'];
	$list_contenu[$i]['pseudo'] = $data['pseudo'];
	$list_contenu[$i]['date'] = date("d/m/Y H:i:s", $data['date']);
	$i++;
}

$smarty->assign('list_contenu', $list_contenu);


//on recupere le nombre de message afin de calculer le nombre de pages
if(isset($_GET['contenu'])){
    $query = 'SELECT count(messages.id) AS nbreId FROM messages INNER JOIN utilisateurs ON messages.id_utilisateurs=utilisateurs.id  WHERE contenu LIKE "%'.$_GET['contenu'].'%" 
	OR pseudo LIKE "%'.$_GET['contenu'].'%"';
}else{
    $query = 'SELECT count(id) AS nbreId FROM messages';
}
$stmt=$pdo->query($query);
while ($data = $stmt->fetch()) {
	
	$nbreMessages=$data['nbreId'];
}


$nbrePages=($nbreMessages) ? ceil($nbreMessages/$mpp) : 1;
$smarty->assign('nbrePages', $nbrePages);
$smarty->assign('nbreMessages', $nbreMessages);
$smarty->assign('pseudo', $pseudo);
$smarty->assign('mpp', 4);

$smarty->display('index.tpl');

?>


