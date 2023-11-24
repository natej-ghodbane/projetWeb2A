<?php
include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';

$livraison= new LivraisonC();
$livraison->showLivraison($_POST["IdLivraison"]);
header('Location:listLivraison.php');
?>