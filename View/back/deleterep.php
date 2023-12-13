<?php

include "C:\xampp\htdocs\integration\controller\rep.php";

$reponse = new reponse();
$reponse->deletereponse($_GET["id"]);
header('Location:listeRec.php');

?>