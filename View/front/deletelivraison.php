<?php

include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
$c = new LivraisonC();

$c->delete($_GET["IdLivraison"]);
header('location:listLivraison.php');