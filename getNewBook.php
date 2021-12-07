<?php 


//******************************************************************************
// CONNECTION TO BDD
require_once 'app/require.php';
    

//******************************************************************************
// GET NEW BOOK BY TITLE IN DATABASE

if($_POST)
{
    
    $title = htmlspecialchars(trim($_POST['title']));
    $bookModel = new BookModel();
    $books = $bookModel->getNewBookByTitle($title);
    echo json_encode($books);
    
}
