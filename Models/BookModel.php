<?php


class BookModel extends Database
{
    
    //**************************************************************************
    // ADD 1 BOOK IN THE DATABASE
    public function addBook($title, $author, $description, $inStock, $fileName, $isFav)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "INSERT INTO `Books`
        (`title_book`, `author_book`, `description_book`, `inStock_book`, `image_book`, `isFav_book`) 
        VALUES (?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(
        [$title, $author, $description, $inStock, $fileName, $isFav]
        );
    }
    
    //**************************************************************************
    // UPDATE 1 BOOK IN THE DATABASE
    public function updateBook($titleBook, $authorBook, $descriptionBook, $inStockBook, $imageBook, $isFavBook, $idBook)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "UPDATE `Books` 
        SET `title_book`= ?, `author_book` = ?, `description_book` = ?, `inStock_book` = ?, `image_book` = ?, `isFav_book` = ?
        WHERE `id_book` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(
        [$titleBook, $authorBook, $descriptionBook, $inStockBook, $imageBook, $isFavBook, $idBook]
        );
    }
    
    
     //**************************************************************************
    // DELETE 1 BOOK IN THE DATABASE
    public function deleteBook($idBook)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "DELETE FROM `Books`     
        WHERE `id_book`=?";
        $q = $pdo->prepare($sql);
        $q->execute(
        [$idBook]
        );
    }
    
    
    //**************************************************************************
    // GET 1 BOOK BY TITLE
    public function getNewBookByTitle($titleBook)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT * FROM `Books` 
        WHERE `title_book` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(     
        [$titleBook]);
        
        $books = $q->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }   
    
    
    
    //**************************************************************************
    // GET 1 BOOK BY ID
    public function getOneBookById($idBook)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT * FROM `Books` 
        WHERE `id_book` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(     
        [$idBook]);
        
        $books = $q->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }
    
    
    //**************************************************************************
    // SEARCH 1 BOOK
    public function searchBook($titleBook)
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT * FROM `Books`
        WHERE `title_book` LIKE ?
        LIMIT 5";
        $q = $pdo->prepare($sql);
        $q->execute(
        [$titleBook . "%"]);
        
        $books = $q->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }
    
    
    //**************************************************************************
    // GET ALL BOOKS
    public function getAllBooks()
    {
        $pdo=$this->Dbconnect();
        
        $sql = "SELECT * FROM Books
        ORDER BY `dateAdd_book` DESC
        LIMIT 5";
        $q = $pdo->prepare($sql);
        $q->execute();
        
        $books = $q->fetchAll(PDO::FETCH_ASSOC); 
        return $books;
    }
    
}