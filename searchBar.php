<?php 


//******************************************************************************
// CONNECTION TO BDD
require_once 'app/require.php';
    

//******************************************************************************
// SEARCH BAR 

if($_POST)
{
    $title = htmlspecialchars(trim(ucwords($_POST['title'])));
    $bookModel = new BookModel();
    echo json_encode($bookModel->searchBook($title));
}
