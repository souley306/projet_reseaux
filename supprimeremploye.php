<?php
  //connexion a la base de données
  include_once "connexion.php";
  //récupération de l'id dans le lien
  $id= $_GET['id'];
  //requête de suppression
  $req = mysqli_query($con , "DELETE FROM employes WHERE id = $id");
  //redirection vers la page index.php
  header("Location:employes.php")
?>