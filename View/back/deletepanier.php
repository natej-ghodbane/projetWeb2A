<?php
include 'C:\xampp\htdocs\projetWeb2A\Controller\panier.php';
$comm = new panier();
$comm->deletepanier($_GET["id"]);
header('Location:listecart.php');