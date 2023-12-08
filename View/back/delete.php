<?php
 
include 'C:\xampp\htdocs\projet\Controller\clientC.php';
$clientC = new ClientC();
$clientC->deleteClient($_GET["id"]);
header('Location:index.php');