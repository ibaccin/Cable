<?php
class Controller
{
    public function renderView($view, $model = null, $useLayout = true)
    {
        if($useLayout)
            require_once("views/_shared/header.php");
        
        require_once($view);
        
        if($useLayout)
            require_once("views/_shared/footer.php");
    }
}