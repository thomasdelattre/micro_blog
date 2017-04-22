<?php 
include('includes/connexion.inc.php');
$query='SELECT votes, derniereIP FROM messages WHERE id='.$_GET['id'];
$stmt=$pdo->query($query);
while($vote=$stmt->fetch()){
    if($vote['derniereIP']!=$_SERVER['REMOTE_ADDR']){
        $newVote=$vote['votes']+1;

        $addVote=$pdo->prepare("UPDATE messages SET votes=:vote, derniereIP=:ip WHERE id=:id");
        $addVote->bindValue("vote", $newVote, PDO::PARAM_INT);
        $addVote->bindValue("ip", $_SERVER['REMOTE_ADDR']);
        $addVote->bindValue("id", $_GET['id']);
        $addVote->execute();
        echo $newVote;
    }else{
        echo $vote['votes'];
    }
}
?>