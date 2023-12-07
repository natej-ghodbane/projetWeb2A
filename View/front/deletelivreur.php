<?php

include 'c:xampp/htdocs/projetWeb2A/controller/LivreurC.php';
$c = new LivreurC();

$c->deletelivreur($_GET["idlivreur"]);
header('location:listlivreur.php');