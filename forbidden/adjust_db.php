<?php 
try{
$PDO = new PDO(	"sqlite:kwara_affairs.db" );
}catch(PDOException $e){
	echo $e->getMessage();
}

$pds= $PDO->query("SELECT * FROM card_menu WHERE 1");
$Cards =$pds->fetchAll(2);

echo "<pre>";
print_r($Cards);
echo "</pre>";/*****/
$pds2 = $PDO->prepare("UPDATE card_menu SET image_url =? WHERE id= ?");
echo "done";
foreach ($Cards  as $key => $value) {
	adjustItem($value,$pds2);
}

function adjustItem($stuff, $pds){
	$stuff['image_url'] = str_replace('/talented', '', $stuff['image_url']);
	$pds->execute(array($stuff['image_url'], $stuff['id']) );
}
