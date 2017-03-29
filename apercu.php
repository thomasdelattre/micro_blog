<?php
$contenu = $_GET ['message'];
$pattern = array('/https?:\/\/[a-zA-Z0-9\-\.]+\.[a-z]+\/?/', '/S*#([\w]+\S*)/', '/[0-9a-z-_.]+\@[0-9a-z.]+\.[a-z]+/');
$matches= array('<a href="$0">$0</a>', '<a href="index.php?contenu=$1">$0</a>', '<a href="mailto:$0">$0</a>');
$list_contenu= preg_replace($pattern, $matches, $contenu);
echo $list_contenu;
?>