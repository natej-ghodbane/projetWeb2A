<?php
include 'C:\xampp\htdocs\projetWeb2A\Controller\commande.php';
$comm = new commande();
$comm->deleteCommande($_GET["id"]);
header('Location:index.php');
