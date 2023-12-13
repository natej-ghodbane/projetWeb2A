<?php

include 'C:\xampp\htdocs\integration\controller\rec.php';

$reclamation = new reclamation();
$reclamation->deletereclamation($_GET["id"]);


?>