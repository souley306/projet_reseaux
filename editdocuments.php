<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM documents WHERE id=$id";
    $result = $conn->query($sql);
    $doc = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $sql = "UPDATE documents SET nom='$nom' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Document mis à jour.";
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>
 <div class="form">
<form action="" method="POST">
    <label>Nom du document :</label>
    <input type="text" name="nom" value="<?= $doc['nom'] ?>" required>
    <button type="submit">Modifier</button>
</form>
<a href="documents.php">Retour</a>
</div>
</body>
</html>