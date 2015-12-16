<?php
include_once 'connect.php';

switch ($_GET["action"]) {
	case "colis":
		deletecolis($_GET);
		break;
	case "personne":
		deletePersonne($_GET);
		break;
	case "personneColis":
		deletePersonneColis($_GET);
		break;
	default:
		;
	break;
}


function deletePersonne($data){
	global $conn;
	
	$sql = "DELETE FROM personnes where ( id =".$data["id"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}

function deletePersonneColis($data){
	global $conn;
	
	$sql = "DELETE FROM personnes where ( id =".$data["id"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne deleted successfully";
		$sql = "DELETE FROM colis where ( id_personne =".$data["id"].")";
		//echo $sql;
		if ($conn->query($sql) === TRUE) {
			echo "personne deleted successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}

function deletecolis($data){
	global $conn;
	
	$sql = "DELETE FROM colis where ( id_perso =".$data["id"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne deleted successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}


$conn->close();
