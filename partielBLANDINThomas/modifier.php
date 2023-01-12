<?php 
include 'connexion.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
    
    $conn = new mysqli('localhost','root','root','partiel');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM partiel");
    $data = $result->fetch_assoc();
    $conn->close();
?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier l'employé : <?php echo $data['nom']; ?> </h2>
        <p class="erreur_message">
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="">
            <label>Prénom</label>
            <input type="text" name="prenom" value="">
            <label>âge</label>
            <input type="number" name="age" value="">
            <input type="submit" value="Modifier" name="modifier">
        </form>
    </div>
    <?php
    $conn = new mysqli('localhost','root','root','partiel');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM partiel");
    $data = $result->fetch_assoc();

    if(isset($_POST['modifier'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
    
        $query = "UPDATE partiel SET nom='$nom', prenom='$prenom', age='$age' WHERE id=$id";
        mysqli_query($conn, $query);
    }
    $conn->close();
    
?>
</body>

</html>