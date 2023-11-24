<?php

include "../../controller/rep.php";

$reponse = new reponse();
$reponse->deletereponse($_GET["id"]);
header('Location:index.html');

?>