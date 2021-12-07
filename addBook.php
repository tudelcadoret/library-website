<?php 


//******************************************************************************
// CONNECTION TO BDD
require_once 'app/require.php';
    

//******************************************************************************
// ADD BOOK

if($_POST)
{
    
    //**************************************************************************
    //**************************************************************************
    // VARIABLES
    
    $title = htmlspecialchars(trim($_POST['title_book']));
    $author = htmlspecialchars(trim($_POST['author_book']));
    $description = htmlspecialchars(trim($_POST['description_book']));
    $inStock = intval($_POST['inStock_book']);
    $isFav = htmlspecialchars(trim($_POST['isFav_book']));

    $fileName = strtolower($_FILES["image_book"]["name"]); 
    $fileTmp = $_FILES['image_book']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileExt = strtolower(end(explode('.',$_FILES['image_book']['name'])));
    $extensions= array("jpeg","jpg","png");
    
    $response = array( 
    'status' => 1, 
    'message' => array()
    ); 
    
    
    //**************************************************************************
    //**************************************************************************
    // CHECKS
    
    //*************************************************
    // NO EMPTY INPUTS
    if( empty($title) ||
        empty($author) ||
        empty($description) ||
        empty($inStock)  )
    {
        $response['status'] = 0;
        $response['message'][] = "Un ou plusieurs champ(s) vide(s)";
    } 
    //*************************************************
    // NO MORE THAN 50 CHARACTERS
    if( strlen($title) > 50 ||
        strlen($author) > 50 || 
        strlen($inStock) > 50)
    {
        $response['status'] = 0;
        $response['message'][] = "Pas plus de 50 caractères.";
    } 
    //*************************************************
    // NO NUMBER FOR NAME'S AUTHOR
    if (preg_match("/[0-9]/", $author))
    {
        $response['status'] = 0;
        $response['message'][] = "Le nom de l'auteur ne doit contenir que des lettres";
    }
    //*************************************************
    // DESCRIPTION MUST BE BETWEEN 20 AND 70 CHARACTERS
    if(!empty($description))
    {
        if(strlen($description) < 20 || strlen($description) > 70)
        {
            $response['status'] = 0;
            $response['message'][] = "La description du livre doit contenir entre 20 et 70 caractères";
        }
    }
    //*************************************************
    // NO NEGATIVE NUMBER FOR QUANTITY IN STOCK
    if ($inStock < 0)
    {
        $response['status'] = 0;
        $response['message'][] = "La quantité doit être un nombre positif";
    }
    //*************************************************
    // SIZE FILE MUST BE INFERIOR THAN 2 MB
    if($file_size > 2097152) {
        $response['status'] = 0;
        $response['message'][] = "Le poids de l'image ne doit pas excéder 2 MB";
    }
    // *************************************************
    // FILE EXTENSION MUST BE PNG OR JPG
    if(in_array($fileExt,$extensions)=== false) {
        $response['status'] = 0;
        $response['message'][] = "Le fichier choisi doit être au format PNG ou JPG";
    }
    
    
    // **************************************************************************
    // **************************************************************************
    // RESPONSE
    
    if($response['status'] === 1)
    {
        $bookModel = new BookModel();
        $bookModel->addBook($title, $author, $description, $inStock, $fileName, $isFav);
        
        move_uploaded_file($fileTmp,"img/".$fileName);
        
        $response['message'] = $title;
    }
    
    echo json_encode($response);
}
