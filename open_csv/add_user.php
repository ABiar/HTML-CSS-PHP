<?php
try{
		$link = new PDO('mysql:host=localhost:3307;dbname=exo1','root', '');
	} catch(PDOExecption $e) {
		print "Erreur !: ".$e->getMessage()."<br />";
		die();
	}
	if($_POST != null){
		$sql = "INSERT INTO client (id, fullname, lastname, email) VALUES(null, :fullname, :lastname, :email)";
				$stmt = $link->prepare($sql);
   				$stmt->execute(array(
   				"fullname"  => $_POST['fullname'],
    			"lastname"  => $_POST['lastname'],
    			"email"     => $_POST['email'],
    ));
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajout à base de données</title>
</head>
<body>
<form action="add_user.php" method="POST">
	<label for="fullname">Prénom :</label>
	<input id="fullname" type="text" name="fullname">
	<label for="lastname">Nom :</label>
	<input id="lastname" type="text" name="lastname">
	<label for="email">Email :</label>
	<input id="email" type="text" name="email">
	<input type="submit" value="Souscrire" name="send">
</form>
</body>
</html>