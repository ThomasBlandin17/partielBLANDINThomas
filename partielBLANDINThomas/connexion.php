<?php

if (isset($_POST['ajouter'])){


$nom = $_POST ['nom'];
$prenom = $_POST ['prenom'];
$age = $_POST ['age'];

	$conn = new mysqli('localhost','root','root','partiel');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into partiel(nom, prenom, age) values(?, ?, ?)");
		$stmt->bind_param("sss", $nom, $prenom, $age);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
		}
		
}
?>
