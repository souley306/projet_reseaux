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
<div class="container">
<h1>Liste des documents</h1>
        <a href="uploaddocuments.php" class="Btn_add"> <img src="images/plus.png"> Ajouter un document</a>
<table border="1">

    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Fichier</th>
        <th>Date</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($conn , "SELECT * FROM documents");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de documents ajouter !" ;} 
                else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nom"] ?></td>
            <td><a href="uploads/<?= $row["fichier"] ?>" download><?= $row["fichier"] ?></a></td>
            <td><?= $row["date_upload"] ?></td> 
            <td><a href="editdocuments.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
            <td><a href="deletedocuments.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
            
            
        </tr> 
        <?php
                    } 
                    
                }
            ?>
</table>
</div>
</body>
</html>