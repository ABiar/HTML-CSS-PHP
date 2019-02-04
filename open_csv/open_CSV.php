<?php
	try{
		$link = new PDO('mysql:host=localhost:3307;dbname=exo1','root', '');
	} catch(PDOExecption $e) {
		print "Erreur !: ".$e->getMessage()."<br />";
		die();
	}
	$file = fopen("open_CSV.csv", "r");

		if($file){
			$c = 0;
			while(($buffer = fgets($file, 4096)) !== false){
				if($c !== 0){
					$line = explode(";", $buffer);
					echo $line[2]."<br />";
				$sql = "INSERT INTO client (id, fullname, lastname, email) VALUES(null, :firstname, :lastname, :email)";
				$stmt = $link->prepare($sql);
   				$stmt->execute(array(
    			"firstname" => $line[1],
    			"lastname"  => $line[0],
    			"email"     => $line[2],
    ));   
				}

				$c++;


			}
			if(!feof($file)){
				echo "Error : unexpected fgets() fail \n";
			}
		fclose($file);
		}
?>