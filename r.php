<?php

	include_once 'connect.php';
	
	switch ($_GET["action"]) {
		case "getAllUsers":
			selectAllUsers($_GET);
			break;
		case "getColisIfUser":
			selectColisByUser($_GET);
			break;				
		default:
			;
		break;
	}
	
	function selectAllUsers(){
		global $conn;
		$list= array();
		
		$sql = "SELECT * FROM personnes";

		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_row()) {
				$list[] = $row;
				//echo $row,'<br>';
			}

			echo json_encode($list);
		}
	}
	
	function selectColisByUser($data){
		global $conn;
		$list= array();
		
		$sql = "SELECT personnes.id, personnes.nom, personnes.prenom, colis.id FROM personnes INNER JOIN colis ON colis.id_personne = personnes.id WHERE colis.id_personne =".$data["id_personne"];
		
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_row()) {
				$list[] = $row;
				//echo $row,'<br>';
			}

			echo json_encode($list);
		}
	}
	
	$conn->close();
?>