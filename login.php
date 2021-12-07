<?php 


//******************************************************************************
// CONNECTION TO BDD
session_start();
require_once 'app/require.php';
    

//******************************************************************************
// ADD BOOK

if($_POST)
{
    
    // **************************************************************************
    // **************************************************************************
    // VARIABLES
    
    $mail = htmlspecialchars(trim($_POST['mail_user']));
    $password = htmlspecialchars(trim($_POST['password_user']));
    
    $errors = [];
    
    $response = array( 
    'status' => 1, 
    'message' => array()
    ); 
        
    $userModel  = new UserModel();
    $user = $userModel->checkUser($mail);
    
    //**************************************************************************
    //**************************************************************************
    // CHECKS
    
    //*************************************************
    // NO EMPTY INPUTS
    if( !empty($mail) && !empty($password) )
    {
        //*************************************************
        // USER MUST HAVE AN ACCOUNT
        if($user) 
        {
            //*************************************************
            //  PASSWORD MUST WATCH
            if(password_verify($password, $user['password_user']))
            {
                $_SESSION['user']['id_user'] = $user['id_user'];
                $_SESSION['user']['lastname_user'] = $user['lastname_user'];
                $_SESSION['user']['firstname_user'] = $user['firstname_user'];
                $_SESSION['user']['mail_user'] = $user['mail_user'];
                $_SESSION['user']['password_user'] = $user['password_user'];
                $_SESSION['user']['role_user'] = $user['role_user'];
            }
            else
            {
                $response['status'] = 0;
                $response['message'][] = "Erreur de mot de passe";
            }
        }
        else
        {
            $response['status'] = 0;
            $response['message'][] = "Aucun compte associé à cette adresse mail";
        }
    }
    else
    {
        $response['status'] = 0;
        $response['message'][] = "Un ou plusieurs champ(s) vide(s)";
    }

    
    // **************************************************************************
    // **************************************************************************
    // RESPONSE
    echo json_encode($response);
}
