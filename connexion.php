<?php
  //connexion à la base de données
  $conn = mysqli_connect("localhost","root","","smarttech");
  if(!$conn){
     echo "Vous n'êtes pas connecté à la base de donnée";
  }
?>