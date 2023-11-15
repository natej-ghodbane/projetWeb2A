<?php

require '../config.php';

class reclamation
{

    public function listreclamation()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteClient($ide)
    {
        $sql = "DELETE FROM reclamation WHERE idrec = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addreclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES ("", :nom,:prenom, :ville,:sujet)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $reclamation->getnom(),
                'prenom' => $reclamation->getprenom(),
                'ville' => $reclamation->getville(),
                'sujet' => $reclamation->getsujet()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showreclamation($id)
    {
        $sql = "SELECT * from reclamation where idrec = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $client = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatereclamation($reclamation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    ville = :ville, 
                    sujet = :sujet
                WHERE idrec= :idrec'
            );
            $query->execute([
                'nom' => $reclamation->getnom(),
                'prenom' => $reclamation->getprenom(),
                'ville' => $reclamation->getville(),
                'sujet' => $reclamation->getsujet()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
