<?php
include "c:xampp/htdocs/projetWeb2A/configuration.php";

class commandeC{
  
    public function listcommandes(){
        $sql = "SELECT * from commandes";
        $db = config::getConnexion();

        try {

            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }

        return $liste;
    }
   
}

?>