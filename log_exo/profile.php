<?php session_start();?>
<?php include("header.php");?>
	<h1>Bienvenue <?php echo $_SESSION['login']?></h1>
<?php include("footer.php");?>