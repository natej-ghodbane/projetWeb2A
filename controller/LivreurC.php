<?php
include "c:xampp/htdocs/projetWeb2A/config.php";

class LivreurC{
  
    public function listlivreurs(){
        $sql = "SELECT * from livreur";
        $db = config::getConnexion();

        try {

            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }

        return $liste;
    }
   
    function addlivreur($livreur)
    {
        $sql = "INSERT INTO livreur 
        VALUES (NULL,:nom_livreur, :numero_tel,:statut_livreur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_livreur' => $livreur->getDateLivraison(),
                'numero_tel' => $livreur->getAdresseLivraison(),
                'statut_livreur' => $livreur->getStatutLivraison(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
   
    }



}

?>