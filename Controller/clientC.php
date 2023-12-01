<?php

 require '../../config.php';
// require 'C:\xampp\htdocs\projet\View\front\config2.php';
// require '../../Model/Client.php';

class ClientC
{

    public static function listClients()
    {
        $sql = "SELECT * FROM utilisateur";
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
        $sql = "DELETE FROM utilisateur WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addClient($client)
    {
        $sql = "INSERT INTO utilisateur  
        VALUES (NULL, :fn,:ln, :ad,:aa,:bb,:cc)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $client->getFirstName(),
                'ln' => $client->getLastName(),
                'ad' => $client->getMotdepasse(),
                'aa' => $client->getEmail(),
                'bb' => $client->getAddress(),
                'cc' => $client->getOccupation()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showClient($id)
    {
        $sql = "SELECT * from utilisateur where id= $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

   function updateClient($client, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE utilisateur SET 
                    nom = :nom, 
                    prenom= :prenom, 
                    Motdepasse = :Motdepasse, 
                    Email = :Email,
                    Adresse = :Adresse,
                    Occupation = :Occupation
                    
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'nom' => $client->getFirstName(),
                'prenom' => $client->getLastName(),
                'Motdepasse' => $client->getMotdepasse(),
                'Email' => $client->getEmail(),
                'Adresse' => $client->getAddress(),
                'Occupation' => $client->getOccupation()

                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }




    function userExists($Email) {
        try {
            $db = config::getConnexion(); 
    
            $query = $db->prepare("SELECT COUNT(*) FROM utilisateur WHERE Email = :Email");
            $query->bindParam(':Email', $Email, PDO::PARAM_STR);
            $query->execute();
    
            $result = $query->fetchColumn();
    
            return $result > 0;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function getPasswordByEmail($Email) {
        try {
            $db = config::getConnexion(); 
    
            $query = $db->prepare("SELECT Motdepasse FROM utilisateur WHERE Email = :Email");
            $query->bindParam(':Email', $Email, PDO::PARAM_STR);
            $query->execute();
    
            return $query->fetchColumn();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }





}

