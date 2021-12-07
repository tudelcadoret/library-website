<?php 

//******************************************************************************
// CONNECTION TO BDD
require_once 'app/Database.php';


//******************************************************************************
// MODELS
require_once 'Models/BookModel.php';
require_once 'Models/UserModel.php';
require_once 'Models/OrderModel.php';
require_once 'Models/PostModel.php';


//******************************************************************************
// MODELS INSTANCIATIONS
$bookModel = new BookModel();
$userModel = new UserModel();
$orderModel = new OrderModel();
$postModel = new PostModel();

