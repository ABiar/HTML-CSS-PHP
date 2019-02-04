<?php
$fruits = ["Banane","Pomme","Fraise","Poire"];

$recherche = $_GET['recherche'];
$trouve = false;
$compteur = 1;
foreach ($fruits as $fruit) {
	if($fruit == $recherche){
		$trouve = true;
		break;
	}
	$compteur ++;
}
if($trouve){
	echo"Trouvé à l'index ".$compteur;
} else{
	echo"Non trouvé";
}
?>