<?php

include "../../controller/rec.php";

$reclamation = new reclamation();
$reclamation->deletereclamation($_GET["id"]);


?>