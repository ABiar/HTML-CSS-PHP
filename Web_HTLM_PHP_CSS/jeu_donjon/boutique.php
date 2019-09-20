<?php 
	
	session_start();

	include 'character.php';
	require 'class/piece.php';
	require 'class/couloir.php';
	require 'class/salle.php';
	require 'store.php';
	



	if (isset($_GET['action']) && $_GET['action']!="") {
		switch($_GET['action']){
			case 'buypotion':
					$_SESSION['nbPotion'] += 1;
					$_SESSION['or'] -= 20;
				}
			}

	intval(strval($_SESSION['hpMax']));
	verifHpMax();
	augDifficult();


?>

<?php include 'header.php';?>

	<div class="userInterface">
			<div class="col-12 grey">
				<p>
					<a href="deco.php" class="btn btn-danger">Déconnexion</a>
					<?php  if ($_SESSION['hp'] > 0) {?>
					<a href="game.php?action=dontEnter" class="btn btn-primary">Quitter la boutique</a>
					<?php } ?>
					<?php  if ($_SESSION['hp'] <= 0) {?>
						<a href="restart.php" class="btn btn-danger">Recommencer</a>
					<?php } ?>
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
									<?php  if($_SESSION['nbPotion']>0 ){?>
										<a href="game.php?action=usepotion" class="btn btn-primary">Utiliser</a> 
									<?php } ?>
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
		<div class="store">
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
							<td>Potions </td>	
							<td>
								<?php if($_SESSION['or'] >= 20){?>
									<a href="boutique.php?action=buypotion" class="btn btn-primary">Acheter</a> 
								<?php } ?>
						</td>
						</tr>
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>