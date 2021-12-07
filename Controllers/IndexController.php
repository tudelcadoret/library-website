<?php 

// router
if(array_key_exists('a',$_GET))
{
    switch ($_GET['a'])
    {
        // *********************************************************************
        // USER WANTS TO REGISTER
        case 'register':
            // view associated
            $template = 'Views/register.phtml';
        break;
        
        // *********************************************************************
        // USER WANTS TO LOGIN
        case 'login':
            // view associated
            $template = 'Views/login.phtml';
        break;
        
        // *********************************************************************
        // USER WANTS TO LOGOUT
        case 'logout':
            session_destroy();
            header("Location: index.php");
            exit;
        break;
        
        // *********************************************************************
        // USER WANTS TO CONTACT STUFF
        case 'contact':
            // view associated
            $template = 'Views/contact.phtml';
        break;
        
        // *********************************************************************
        // USER WANTS TO SEE ALL BOOKS
        case 'showAllBooks':
            $books = $bookModel->getAllBooks();
            // view associated
            $template = 'Views/showAllBooks.phtml';
        break;
        
        // *********************************************************************
        // USER WANTS TO SEE BOOK DETAILS   
        case 'bookDetails':
            $idBook = $_GET['idBook'];
            $idUser = $_GET['idUser'];
            $bookDetails = $bookModel->getOneBookById($idBook);
            // view associated
            $template = 'Views/bookDetails.phtml';  
        break;
        
        // *********************************************************************
        // USER WANTS TO SEE HIS PERSONAL SPACE
        case 'userspace':
            $idUser = $_GET['idUser'];
            $userOrders = $orderModel->getUserOrders($idUser);
            // view associated
            $template = 'Views/userspace.phtml';
        break;
        
    }
} else 
{   
    // view associated
    $template = 'Views/index.phtml';
}