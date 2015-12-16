<?php
include_once 'connect.php';

switch ($_GET["action"]) {
	case "colis":
		deletecolis($_GET);
		break;
	case "personne":
		deletePersonne($_GET);
		break;
	default:
		;
	break;
}


function deletePersonne($data){
	global $conn;
	
	$sql = "DELETE FROM personnes where ( id_perso =".$data["id"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "personne deleted successfully";
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
