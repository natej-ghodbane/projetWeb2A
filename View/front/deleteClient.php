<?php
 
include 'C:\xampp\htdocs\integration\controller\clientC.php';
$clientC = new ClientC();
$clientC->deleteClient($_GET["id"]);
header('Location:listClient.php');

