<?php 

	if (!isset($_SESSION['occuped'])) {
		$_SESSION['occuped'] = 0;
	}

	

	if(!isset($_SESSION['or'])) {
		$_SESSION['or'] = 0;
	}

	if(!isset($_SESSION['hp'])) {
		$_SESSION['hp'] = 20;
	}

	if(!isset($_SESSION['hpMax'])) {
		$_SESSION['hpMax'] = 20;
	}


	if (!isset($_SESSION['exp'])) {
		$_SESSION['exp'] = 0;
	}


	if (!isset($_SESSION['expMax'])) {
		$_SESSION['expMax'] = 20;
	}

	if(!isset($_SESSION['lvl'])){
		$_SESSION['lvl'] = 1;
	}

	if (!isset($_SESSION['piece'])) {
		$_SESSION['piece'] = array();
	}

	if (!isset($_SESSION['nbPotion'])) {
		$_SESSION['nbPotion'] = 0;
	}

	intval(strval($_SESSION['hpMax']));
	verifHpMax();
	augDifficult();

	function progressXP()
	{
		$pourcentage;
		$pourcentage = ($_SESSION['exp'] * 100)/$_SESSION['expMax'];
		return $pourcentage;
	}	


	function augDifficult()
	{	
		$verif = $_SESSION['expMax'] - $_SESSION['exp'];
		if ($verif <= 0) 
		{
			$verif = $verif*(-1);
			$_SESSION['expMax'] = $_SESSION['expMax'] * 1.15;
			$_SESSION['exp'] = 0;
			$_SESSION['exp'] = $_SESSION['exp'] + $verif;
			$_SESSION['lvl'] += 1;
			$_SESSION['hpMax'] = $_SESSION['hpMax'] * 1.15;
			}
		}

	function verifHpMax()
	{
		$verif = $_SESSION['hpMax'] - $_SESSION['hp'];
		if($verif < 0)
		{
			$_SESSION['hp'] = $_SESSION['hp'] + $verif;
		}
	}
?>