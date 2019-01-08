<?php

require_once("core/baseController.php");
require_once("models/accountModel.php");

class accountController extends Controller
{
    public function indexAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/account/index.php");
        } else {

        }        
    }
    public function registerAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/account/register.php");
        } else {
            $registration = registerModel::registrate($_POST);
            //header('Location: /home');
        } 
    }
    
   
}