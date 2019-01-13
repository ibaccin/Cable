<?php

require_once("core/baseController.php");
require_once("models/homeModel.php");
class homeController extends Controller
{
    public function indexAction()
    {
        $this->renderView("views/home/index.php");
    }
   public function productAction()
   {
        $load = homeModel::loadProduct();
        $this->renderView("views/home/product.php",$load);
   }
    
   
}