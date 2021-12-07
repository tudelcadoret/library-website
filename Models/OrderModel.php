<?php


class OrderModel extends Database
{
    //**************************************************************************
    // RESERVE 1 BOOK
    public function reserveBook($idUser, $idBook)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "INSERT INTO `Orders`(`id_user`, `id_book`) 
        VALUES (?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(
            [$idUser, $idBook]
        );
    }
    
    
    //**************************************************************************
    // GET ALL ORDERS
    public function getAllOrder()
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT * 
        FROM Orders";
        $q = $pdo->prepare($sql);
        $q->execute();
        
        $orders = $q->fetchAll(PDO::FETCH_ASSOC); 
        return $orders;
    }
    
        
    //**************************************************************************
    // GET ORDERS USER
    public function getUserOrders($idUser)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT Books.title_book , Orders.date_order
        FROM Orders
        INNER JOIN Users ON Orders.id_user = Users.id_user
        INNER JOIN Books ON Orders.id_book = Books.id_book
        WHERE Users.id_user = ?";
        $q = $pdo->prepare($sql);
        $q->execute(
            [$idUser]);
        
        $orders = $q->fetchAll(PDO::FETCH_ASSOC); 
        return $orders;
    }
    
    
    //**************************************************************************
    // CHECK USER ORDERS
    public function checkUserOrders($idUser, $idBook)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT Books.title_book , Orders.date_order
        FROM Orders
        INNER JOIN Users ON Orders.id_user = Users.id_user
        INNER JOIN Books ON Orders.id_book = Books.id_book
        WHERE Users.id_user = ? AND Books.id_book = ?";
        $q = $pdo->prepare($sql);
        $q->execute(
            [$idUser, $idBook]);
        
        $orders = $q->fetchAll(PDO::FETCH_ASSOC); 
        return $orders;
    }
}