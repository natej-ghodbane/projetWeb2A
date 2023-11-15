<?php

include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'c:xampp/htdocs/projetWeb2A/model/Livraison.php';
$c = new LivraisonC();

$c->delete($_GET['id']);
header("location:listLivraison.php");