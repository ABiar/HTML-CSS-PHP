<?php 

class Salle extends Piece{
	private $nbType;

	private $typeDescription = array(
		0	=> "Vous entrez dans une salle. Il n'y a rien sauf un peu de poussières (ça mériterait un peu de ménage).",
		1	=>"Vous entrez dans une salle. Un coffre rempli de babiolles est présent, vous prenez le nécéssaire.",
		2	=>"Vous entre dans une salle. Un monstre est tapi dans l'ombre vous pouvez choisir de fuir ou de vous battre",
		3	=>"Vous entrez dans une salle. Un coffre débordant d'or s'y trouve vous vous emparez du butin."
	);

	function __construct(){
		$this->nbType = rand(0, (count($this->typeDescription)-1) );
	}

	function getDescription(){
		return $this->typeDescription[$this->nbType];
	}


	public function getType(){
		switch ($this->nbType) {
			case 0:
				return "Pièce vide";
				break;
			case 1:
				return "Pièce à objet";
				break;
			case 2:
				return "Pièce ennemi";
				break;
			case 3:
				return "Pièce à trésor";
				break;
		}
	}

	public function action() {
		switch($this->nbType) {
			case 1:
				$rand = rand(1,3);
				if($rand == 3)
				{
					$_SESSION['nbPotion'] += 1;
					echo "Vous avez trouvé une potion";
				}
				else
				{
					echo "Vous n'avez rien trouver";
				}
				break;
			case 2:
				$_SESSION['occuped'] = 2;
				break;
			case 3:
				$or = rand(10,100);
				echo "Vous avez trouvé ".$or." or";
				$_SESSION['or'] = $_SESSION['or'] + $or;
				break;
			
		}
	}
}
