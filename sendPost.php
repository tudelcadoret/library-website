<?php 


//******************************************************************************
// CONNECTION TO BDD
require_once 'app/require.php';
    

//******************************************************************************
// RESERVE BOOK

if($_POST)
{
    
    //**************************************************************************
    //**************************************************************************
    // VARIABLES
    $idUser = $_POST['id_user'];
    $content = htmlspecialchars(trim($_POST['content_post']));
    
    $response = array( 
    'status' => 1, 
    'message' => array()
    ); 
    
    
    //**************************************************************************
    //**************************************************************************
    // CHECKS
    
    //*************************************************
    // NO EMPTY INPUTS
    if(empty($content))
    {
        $response['status'] = 0;
        $response['message'][] = "Le champ doit être renseigné";
    } 
    //*************************************************
    // NUMBER CHARACTERS MUST BE BETWEEN 0 AND 100  
    if(strlen($content) < 20 || strlen($content) > 100)
    {
        $response['status'] = 0;
        $response['message'][] = "Le message doit faire entre 20 et 100 caractères.";
    }
    
    
    // **************************************************************************
    // **************************************************************************
    // RESPONSE
    
    if($response['status'] === 1)
    {
        $postModel = new PostModel();
        $postModel->sendPost($idUser, $content);
    }
    
    echo json_encode($response);
}
