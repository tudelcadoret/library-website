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
    $idBook = $_POST['id_book'];
    
    $response = array( 
    'status' => 1, 
    'message' => array()
    ); 
    
    $orderModel = new OrderModel();
    
    
    //**************************************************************************
    //**************************************************************************
    // CHECKS   
    
    $check = $orderModel->checkUserOrders($idUser, $idBook);
    if($check)
    {
        $response['status'] = 0;
        $response['message'][] = "Livre déjà commandé";
    }
    
    
    // **************************************************************************
    // **************************************************************************
    // RESPONSE
    
    if($response['status'] === 1)
    {
        $response['message'] = "Livre commandé, bonne lecture !";
        $orderModel = new OrderModel();
        $orderModel->reserveBook($idUser, $idBook);
    }
    
    echo json_encode($response);
}
