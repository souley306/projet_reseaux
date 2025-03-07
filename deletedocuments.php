<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer le fichier
    $sql = "SELECT fichier FROM documents WHERE id=$id";
    $result = $conn->query($sql);
    $doc = $result->fetch_assoc();

    // Supprimer le fichier
    if (file_exists("uploads/" . $doc['fichier'])) {
        unlink("uploads/" . $doc['fichier']);
    }

    // Supprimer de la base de données
    $sql = "DELETE FROM documents WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Document supprimé.";
    } else {
        echo "Erreur : " . $conn->error;
    }
}

header("Location: documents.php");
?>
