<?php

require 'C:\xampp\htdocs\projetWeb2A\config.php';

class commande
{

    public function listOrders()
    {
        $sql = "SELECT * FROM orders";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($ide)
    {
        $sql = "DELETE FROM orders WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addorders($orders)
    {
        $sql = "INSERT INTO orders  
        VALUES (NULL, :nom,:prenom, :email,:tel)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $orders->getNom(),
                'prenom' => $orders->getPrenom(),
                'email' => $orders->getEmail(),
                'tel' => $orders->getTel(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showOrders($id)
    {
        $sql = "SELECT * from orders where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $orders = $query->fetch();
            return $orders;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatecommande($order,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE orders SET 
                status = :sta 
                WHERE `orders`.`id` = $id"
            );

            $query->execute([
                'sta' => $order->getstatus()
            ]
            );

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
