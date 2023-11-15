<?php

include 'C:\xampp\htdocs\projetWeb2A\Controller\produit.php';

$c = new Produit();




$c->delete($_GET['id']);
header("location:products.php");