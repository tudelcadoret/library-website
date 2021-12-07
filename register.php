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
    
    $lastname = htmlspecialchars(trim($_POST['lastname_user']));
    $firstname = htmlspecialchars(trim($_POST['firstname_user']));
    $mail = htmlspecialchars(trim($_POST['mail_user']));
    $password = htmlspecialchars(trim($_POST['password_user']));
    $cpassword = htmlspecialchars(trim($_POST['cpassword_user']));
    
    
    $response = array( 
    'status' => 1, 
    'message' => array()
    ); 
    
    
    //**************************************************************************
    //**************************************************************************
    // CHECKS
    
    //*************************************************
    // NO EMPTY INPUTS
    if( empty($lastname) ||
        empty($firstname) || 
        empty($mail) || 
        empty($password) || 
        empty($cpassword) )
    {
        $response['status'] = 0;
        $response['message'][] = "Un ou plusieurs champ(s) vide(s)";
    } 
    //*************************************************
    // NO MORE 50 CHARACTERS    
    if( (strlen($lastname) > 50) || 
        (strlen($firstname) > 50) || 
        (strlen($mail) > 50) || 
        (strlen($password) > 50) || 
        (strlen($cpassword) > 50) )
    {
        $response['status'] = 0;
        $response['message'][] = "Pas plus de 50 caractères par champ";
    }
    //*************************************************
    // NO NUMBER FOR LASTNAME AND FIRSTNAME
    if( (!preg_match('/^\D*$/', $lastname)) ||
        (!preg_match('/^\D*$/', $firstname)) )
    {
        $response['status'] = 0;
        $response['message'][] = "Pas de chiffre pour nom et prénom";
    }
    //*************************************************
    // CHECK THE FORMAT OF THE MAIL ADDRESS
    if( !preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $mail) )
    {
        $response['status'] = 0;
        $response['message'][] = "Adresse mail au mauvais format";
    }
    //*************************************************
    // MAIL MUST NOT BE ALREADY USED
    $userModel  = new UserModel();
    $user = $userModel->checkUser($mail);
    if($user)
    {
        $response['status'] = 0;
        $response['message'][] = "Un compte existe déjà avec cette adresse mail";
    }
    //*************************************************
    // PASSWORD AND CPASSWORD MUST BE IDENTICAL
    if($password != $cpassword)
    {
        $response['status'] = 0;
        $response['message'][] = "Le mot de passe et sa confirmation doivent être identiques";
    }
    
    
    //**************************************************************************
    //**************************************************************************
    // RESPONSE
    
    if($response['status'] === 1)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $roleUser = null;
        // role admin
        if($_POST['mail_user'] === 'tudel.cadoret@gmail.com')
        {
            $roleUser = "admin";
        }
        // role user
        else 
        {
            $roleUser = "user";
        }
            
        $userModel = new UserModel();
        $userModel->addUser($lastname, $firstname, $mail, $hashPassword, $roleUser);
    }
    
    echo json_encode($response);
}
