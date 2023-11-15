<?php
include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
$livraison= new LivraisonC();
$livraison->showLivraison($_POST["id"]);
header('Location:listLivraison.php');
?>