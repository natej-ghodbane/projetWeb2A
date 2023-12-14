<?php
include_once '/xampp/htdocs/project/config.php';

class postsC
{
    public function addpost($posts)
    {
        $sql = "INSERT INTO posts (id_post, path_image, title, category, created_at) VALUES (NULL, :path_image, :title, :category, CURRENT_TIMESTAMP)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'path_image' => $posts->getPathImage(),
                'title' => $posts->getTitle(),
                'category' => $posts->getCategory()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function deletepost($id_post_post)
{
    $sql = "DELETE FROM posts WHERE id_post = :id_post";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id_post', $id_post_post);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    public function listpost()
    {
        $sql = "SELECT * FROM posts";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function updatepost($post, $id_post)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE posts SET 
                    path_image = :path_image, 
                    title = :title, 
                    category = :category, 
                    created_at = :created_at
                WHERE id_post= :id_post'
            );

            $query->execute([
                'id_post' => $id_post,
                'path_image' => $post->getpath_image(),
                'title' => $post->gettitle(),
                'category' => $post->getcategory(),
                'created_at' => $post->getCreatedAt(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function showpost($id)
    {
        $sql = "SELECT * from posts where id_post = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $dest = $query->fetch(); // Change $joueur to $dest
            return $dest;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
?>
