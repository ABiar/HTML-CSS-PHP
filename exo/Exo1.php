<?php
try {
    $link = new PDO('mysql:host=localhost:3307;dbname=exo1',
	'root', '');

    $sql = "SELECT * FROM client WHERE id = :id";

    $stmt = $link->prepare($sql);
    $stmt->execute(array(
    	"id" => $_GET['id']
    ));
    $result = $stmt->fetch();
    print_r($result);

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}
?>