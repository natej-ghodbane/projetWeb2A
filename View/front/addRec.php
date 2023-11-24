<?php

include "../../controller/rec.php";

$rec=new reclamation();
$rec->addreclamation();
header('Location:reclamation.html');
?>

