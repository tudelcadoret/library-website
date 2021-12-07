<?php


class PostModel extends Database
{
    // /**************************************************************************
    // SEND POST
    public function sendPost($idUser, $content)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "INSERT INTO `Posts`(`id_user`, `content_post`) 
        VALUES (?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(
            [$idUser, $content]
        );
    }
}