<?php
include 'C:\xampp\htdocs\projetWeb2A\Controller\commande.php';
$clientC = new ClientC();
$clientC->deleteClient($_GET["id"]);
header('Location:listClient.php');
