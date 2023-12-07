<?php 

require_once 'C:\xampp\htdocs\projetWeb2A\View\front\includes\dompdf\autoload.inc.php';
use Dompdf\Dompdf;


ob_start();
require_once 'C:\xampp\htdocs\projetWeb2A\View\front\orders.php';
$html = ob_get_contents();
ob_get_clean();


$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$fichier = 'commande.pdf';
$dompdf->stream($fichier);
