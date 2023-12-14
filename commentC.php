<?php

include_once '/xampp/htdocs/project/config.php';
class commentC
{
    public function listcomment()
    {
        $sql = "SELECT * FROM comment";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecomment($id_comt)
    {
        $sql = "DELETE FROM comment WHERE id_comt = :id_comt";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_comt', $id_comt);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addcomment($comment)
    {
        $sql = "INSERT INTO comment 
        VALUES (NULL, :id_post, :id_util, :text_comt,0,0)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_post' => $comment->getidpost(),
                'id_util' => $comment->getId_util(),
                'text_comt' => $comment->getText_comt(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showComment($id)
    {
        $sql = "SELECT * from comment where id_comt = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comment = $query->fetch();
            return $comment;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function updatecomment($comment, $id_comt)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE comment SET 
                    text_comt = :text_comt
                WHERE id_comt = :id_comt'
            );

            $query->execute([
                'text_comt' => $comment->getText_comt(),
                'id_comt' => $id_comt,
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

   


    function getLikecomment($commentId)
    {
        $db = config::getConnexion();
        $result = $db->query("SELECT `like` FROM comment WHERE id_comt = $commentId");
        return $result->fetchColumn();
    }

    function getDislikecommentt($commentId)
    {
        $db = config::getConnexion();
        $result = $db->query("SELECT dislike FROM comment WHERE id_comt = $commentId");
        return $result->fetchColumn();
    }
    function getnameutil($Id)
    {
        $db = config::getConnexion();
        $result = $db->query("SELECT namutil FROM utilisateur WHERE  id_util = $Id");
        return $result->fetchColumn();
    }

    function getemailutil($id)
    {
        $sql = "SELECT email FROM utilisateur WHERE id_util = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comment = $query->fetch();
            return ($comment) ? $comment['email'] : null;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getnamutil($id)
    {
        $sql = "SELECT namutil FROM utilisateur WHERE id_util = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comment = $query->fetch();
            return ($comment) ? $comment['namutil'] : null;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
function triercommande()
 {
     $sql = "SELECT * from comments ORDER BY id_comt DESC";
     $blog = config::getConnexion();
     try {
         $req = $blogging->query($sql);
         return $req;
     } 
     catch (Exception $e)
      {
         die('Erreur: ' . $e->getMessage());
     }
 
 
 
 }

 //y
 function triercommande1()
 {
     $sql = "SELECT * from comments ORDER BY id_comt ASC";
     $blog = config::getConnexion();
     try {
         $req = $blogging->query($sql);
         return $req;
     } 
     catch (Exception $e)
      {
         die('Erreur: ' . $e->getMessage());
     }
 
 
 
 }

 function getCommentPercentagePerDay()
    {
        $sql = "SELECT DATE(date_comt) as comment_date, COUNT(*) as comment_count
                FROM comment
                GROUP BY DATE(date_comt)
                ORDER BY DATE(date_comt)";

        $db = config::getConnexion();
        
        try {
            $query = $db->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

        



    
}
