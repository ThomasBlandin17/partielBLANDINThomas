<?php 
include 'connexion.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
<?php
$conn = new mysqli('localhost','root','root','partiel');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM partiel");
echo '<table>';
echo '<tr>';
echo '<th>Nom</th>';
echo '<th>Prénom</th>';
echo '<th>Age</th>';
echo '<th>Modifier</th>';
echo '<th>Supprimer</th>';
echo '</tr>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['nom'] . '</td>';
    echo '<td>' . $row['prenom'] . '</td>';
    echo '<td>' . $row['age'] . '</td>';
    echo '<td><a href="modifier.php?id=' . $row['id'] . '">Modifier</a></td>';
    echo '<td><a href="supprimer.php?id=' . $row['id'] . '"> Supprimer</a></td>';
    echo '</tr>';
}
echo '</table>';
$conn->close();
?>

    </div>
</body>

</html>