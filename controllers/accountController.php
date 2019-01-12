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
            $account = new accountModel();
            if($account->tryMap($_POST))
            {
                $account->login();
                header('Location: /home');
            }
        }        
    }
    public function profileAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/account/profile.php");
        } else {
            $change = accountModel::changePhoto($_POST);
            $this->renderView("views/account/profile.php");
        }        
    }

    
    public function logOutAction()
    {
        session_destroy();
        header('Location: /account');     
    }
    public function registerAction()
    {
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $this->renderView("views/account/register.php");
        } else {
            $registration = registerModel::registrate($_POST);
            header('Location: /account');
        } 
    }
    
   
}