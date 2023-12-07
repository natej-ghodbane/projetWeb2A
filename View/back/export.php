<?php

require "C:/xampp/htdocs/projetWeb2A/controller/LivraisonC.php"; // Assurez-vous d'inclure votre classe LivraisonC

// Fonction pour exporter les livraisons au format CSV
function exportLivraisonsToCSV()
{
    // Instanciation de la classe LivraisonC
    $livraisonC = new LivraisonC();

    // Récupération de la liste des livraisons
    $livraisons = $livraisonC->listLivraisons();

    // Nom du fichier CSV de sortie
    $filename = 'livraisons_export.csv';

    // Ouverture du fichier en écriture
    $fp = fopen($filename, 'w');

    // En-têtes du fichier CSV
    $headers = array('IdLivraison', 'AdresseLivraison', 'StatutLivraison');
    fputcsv($fp, $headers);

    // Écriture des données de livraison dans le fichier CSV
    foreach ($livraisons as $livraison) {
        fputcsv($fp, array(
            $livraison['IdLivraison'],
            $livraison['AdresseLivraison'],
            $livraison['StatutLivraison']
        ));
    }

    // Fermeture du fichier
    fclose($fp);

    // Envoi du fichier CSV au navigateur
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);

    // Suppression du fichier CSV après l'envoi
    unlink($filename);
}

// Appel de la fonction pour exporter les livraisons au format CSV
exportLivraisonsToCSV();


?>
