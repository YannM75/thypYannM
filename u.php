<?php

	include_once 'connect.php';

	switch ($_GET["action"]) {
		case "upDatepersonne":
			majPersonne($_GET);
			break;
		case "upDatecolis":
			majColis($_GET);
			break;		
		default:
			;
		break;
	}

	function majPersonne($data){
		global $conn;
		$sql = "update `personnes` set nom=". $data["nom"] ." prenom=". $data["prenom"] ." addresse=". $data["addresse"] ." where id =" $data["id"];

		//echo $sql;
		if ($conn->query($sql) === TRUE) {
			echo "score updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	function majColis($data){
		global $conn;
		$sql = "update colis set id_personne=". $data["id_personne"] ." where id =" $data["id_colis"];

		//echo $sql;
		if ($conn->query($sql) === TRUE) {
			echo "score updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>