<?php 


//******************************************************************************
// CONNECTION TO BDD
require_once 'app/require.php';
    

//******************************************************************************
// DELETE BOOK  
if($_GET)
{
    $id = $_GET['id'];
    $bookModel = new BookModel();
    $bookModel->deleteBook($id); 
}













