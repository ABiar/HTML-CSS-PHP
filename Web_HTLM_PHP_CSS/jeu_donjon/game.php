<?php  

	session_start();
	include 'character.php';
	require 'class/piece.php';
	require 'class/couloir.php';
	require 'class/salle.php';
	require 'store.php';
	require 'class/potion.php';
	

	if (!isset($_SESSION['ennemi'])) {
		$_SESSION['ennemi'] = 0;
	}


	if (isset($_GET['action']) && $_GET['action']!="") {
		switch($_GET['action']){
			case 'usepotion':
				if($_SESSION['nbPotion']>0){
				$potion = new potion();
				$potion->giveHealth();
				$_SESSION['nbPotion'] -= 1;
				break;
			}
			case 'dontEnter':
				$_SESSION['occuped'] = 0;
				break;
			case 'flee':
				$fleeDammage = rand(1,3);
				$_SESSION['hp'] -= $fleeDammage;
				$_SESSION['occuped'] = 0;
				break;
			case 'engage':
				$randDammageFight = rand(2,10);
				$randXP = rand(3,10);
				$_SESSION['exp'] += $randXP;
				$_SESSION['hp'] -= $randDammageFight;
				$_SESSION['occuped'] = 0;
				break;
		
		}
	}
	
	intval(strval($_SESSION['hpMax']));
	verifHpMax();
	augDifficult();
	
?>

<?php include 'header.php'; ?>

	<div class="userInterface">
			<div class="col-12 grey">
				<p>
					<a href="deco.php" class="btn btn-danger">Déconnexion</a>
					
				</p>
				<h1>Inventaire</h1>
			</div>
			<div class="inventory">
			<table id="" class="display" width="90%">
					<div class="thead-font-color">
						<thead>
							<tr>
								<th>Objets</th>
								<th>Action</th>
							</tr>
						</thead>
					</div>
					<tbody>
							<tr>
								<td><?php  if($_SESSION['nbPotion']>0){?> Potions : <?php echo $_SESSION['nbPotion'];} ?></td>	
								<td>
									<?php  if($_SESSION['nbPotion']>0){?>
										<a href="game.php?action=usepotion" class="btn btn-primary">Utiliser</a> <?php } ?>
							</td>
							</tr>
					</tbody>
				</table>
			</div>
	</div>
	<div class="gameEvent">
		<div class="col-12 grey">

			<p>| Argent : <?php echo $_SESSION['or'];?> | Points de vie : <?php echo intval($_SESSION['hp']);?> | Niveau : <?php echo $_SESSION['lvl']; ?> |</p>
		</div>
			<div class="col-12 grey">
					<?php  
						if($_SESSION['occuped'] == 0) {
							$rand = rand(1,9);
							if($rand % 2 == 0 )
							{
								$piece = new Salle();
								$piece->action();
							}	
							elseif ($rand % 5 == 0) {
								$_SESSION['occuped'] = 1;
								$piece = new Boutique();
							}else{
								$piece = new Couloir();
							}
						}
					?>
					<?php  if ($_SESSION['hp'] > 0 && $_SESSION['occuped'] == 0) {?>
					<a href="game.php?action=dontEnter" class="btn btn-primary">Continuer</a>
					<?php } ?>
					<?php  if ($_SESSION['hp'] <= 0) {?>
						<a href="restart.php" class="btn btn-danger">Recommencer</a>
					<?php } ?>

					<?php if ($_SESSION['hp'] > 0 && $_SESSION['occuped'] == 1) { ?>
					<a href="boutique.php" class="btn btn-success"> Entrer dans la boutique</a> <a href="game.php?action=dontEnter" class="btn btn-success">Ne pas entrer dans la boutique</a>
					<?php } ?>

					<?php if ($_SESSION['hp'] > 0 && $_SESSION['occuped'] == 2) { ?>
					<a href="game.php?action=engage" class="btn btn-success"> Attaquer le monstre </a> <a href="game.php?action=flee" class="btn btn-success">Fuir</a>
					<?php } ?>

					<div class="contentEvent">
						<?php 
							echo $piece->getDescription();
						?>
					</div>
					<div class="contentEventPassed">
						<?php
							/*if($piece->getType() != "Couloir"){
								if($piece->getDescription() != ""){
									array_unshift($_SESSION['piece'], $piece->getDescription())
									;
								}
							}*/
							foreach ($_SESSION['piece'] as $value) {
								echo$value."<br />";
								echo "-------------------------------------------------------------------------"."<br />";
							}
							array_unshift($_SESSION['piece'], $piece->getDescription());
						?>
					</div>
						<p>
							<div class="progress">
			  					<div class="progress-bar" role="progressbar" style=" width:<?php echo progressXP(); ?>%;" aria-valuenow="<?php echo intval($_SESSION['exp']); ?>" aria-valuemin="0" aria-valuemax="<?php $_SESSION['expMax']; ?>">
			  						<?php echo progressXP(); ?>%
			  					</div>
							</div>
					</p>
			</div>		
		</div>
</body>
</html>