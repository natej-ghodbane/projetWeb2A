<?php

include 'C:\xampp\htdocs\projetWeb2A\Controller\produit.php';

$c = new Produit();


$c->update($_GET['id'],$_GET['quantité']);
header("location:products.php");