<?php

	include_once 'connect.php';

	switch ($_GET["action"]) {
		case "personne":
			createPersonne($_GET);
			break;
		case "colis":
			createColis($_GET);
			break;		
		default:
			;
		break;
	}
	
	function createPersonne($data){
		global $conn;
		
		echo $sql,'<br>';
		
		$sql = "INSERT INTO `flux_colis`.`personnes` (`id`, `nom`, `prenom`, `addresse`) VALUES (NULL, '".$data["nom"]."', '".$data["prenom"]."', '".$data["adresse"]."')"
		
		if ($conn->query($sql) === TRUE) {
		//    echo "New record created successfully";
		} else {
		 //   echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	function createColis($data){
		global $conn;
		
		$sql = "INSERT INTO `flux_colis`.`colis` (`id`, `id_personne`) VALUES (NULL, '".$data["id_personne"]."');"
		
		
		if ($conn->query($sql) === TRUE) {
		//    echo "New record created successfully";
		} else {
		 //   echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>