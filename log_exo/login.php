<?php
	session_start();
	$error_logged = false;
	if (isset($_POST['login']) && $_POST['login'] == 'admin' && isset($_POST['mdp']) && $_POST['mdp'] == 'admin') {
			$_SESSION['login'] = $_POST['login'];
			header('location: profile.php');
			exit();
	}
	if(isset($_POST['send'])){
		$error_logged = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/style.css">
	<title>Login</title>
</head>
<body>
	<div class="contain">
		<form action="login.php" method="POST">
			<?php 
				if($error_logged){
					echo "Merci d'utiliser un compte valide";
				}
			?>
			<p>
			<input id="login" type="texte" name="login" required placeholder="Entrez votre login">
				</p>
				<p>
			<input id="mdp" type="password" name="mdp" required placeholder="Entrez votre mot de passe">
				</p>
				<p>
			<input type="submit" value="Connexion" name="send">
			</p>
		</form>
	</div>
</body>
</html>


