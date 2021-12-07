<?php


class UserModel extends Database
{
    
    //**************************************************************************
    // ADD 1 USER
    public function addUser($lastnameUser, $firstnameUser, $mailUser, $passwordUser, $roleUser)
    {
        $pdo=$this->Dbconnect();
        
        $sql="INSERT INTO `Users`
        (`lastname_user`, `firstname_user`, `mail_user`, `password_user`, `role_user`) 
        VALUES (?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(
        [$lastnameUser, $firstnameUser, $mailUser, $passwordUser, $roleUser]
        );
    }
    
    
    //**************************************************************************
    // UPDATE 1 USER
    public function updateUser($lastnameUser, $firstnameUser, $mailUser, $passwordUser, $roleUser, $idUser)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "UPDATE `Users` 
        SET `lastname_user`= ?, `firstname_user`= ?, `mail_user`= ?, `password_user`= ?, `role_user`= ? 
        WHERE `id_user`= ?";
        $q = $pdo->prepare($sql);
        $q->execute(
        [$lastnameUser, $firstnameUser, $mailUser, $passwordUser, $roleUser, $idUser]
        );
    }
    
    
    //**************************************************************************
    // GET ALL USERS    
    public function getAllUsers()
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT * FROM Users";
        $q = $pdo->prepare($sql);
        $q->execute();
        
        $users = $q->fetchAll(PDO::FETCH_ASSOC); 
        return $users;
    }
    
    
    //**************************************************************************
    // CHECK IF 1 USER EXISTS
    public function checkUser($mailUser)
    {
        $pdo=$this->Dbconnect();
        
        $sql= "SELECT * FROM `Users` 
        WHERE `mail_user`= ?";
        $q= $pdo->prepare($sql);
        $q->execute([$mailUser]);
        
        $check = $q->fetch(PDO::FETCH_ASSOC);
        return $check;
    }
}