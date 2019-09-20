<?php
class potion
{
	private $_health;

	function __construct(){
		$this->_health = rand(3,10);
	}
	function giveHealth()
	{
		$_SESSION['hp'] += $this->_health;

	}

}



