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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $fichier = $_FILES["fichier"]["name"];
    $chemin = "uploads/" . basename($fichier);

    if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin)) {
        $sql = "INSERT INTO documents (nom, fichier) VALUES ('$nom', '$fichier')";
        if ($conn->query($sql) === TRUE) {
            echo "Document ajouté avec succès.";
        } else {
            echo "Erreur : " . $conn->error;
        }
    } else {
        echo "Erreur lors du téléchargement.";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data" >
    <label>Nom du document :</label>
    <input type="text" name="nom" required>
    <label>Choisir un fichier :</label>
    <input type="file" name="fichier" required>
    <button type="submit">Uploader</button>
</form>
</body>
</html>