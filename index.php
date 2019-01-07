<?php

$requestUri=explode("/", $_SERVER["REQUEST_URI"]);

$controllerName = isset($requestUri[1]) && !empty($requestUri[1]) ? $requestUri[1] : "home";
$controllerFilePath = "controllers/".$controllerName."Controller.php";


$actionName = isset($requestUri[2]) ? $requestUri[2] : "index";

try
{
    if(file_exists($controllerFilePath))
    {
        require_once($controllerFilePath);
        
        $controllerClassName =  $controllerName."Controller";
        
        if(class_exists($controllerClassName))
        {
            $controller = new $controllerClassName;
            $actionClassMethodName = $actionName."Action";
            if(method_exists($controller,$actionClassMethodName))
            {
                $controller->{$actionClassMethodName}();
            }
            else
            {
                throw new Exception("Method $actionClassMethodName in controller class not found in file:$controllerFilePath class:$controllerName");
            }
        }
        else
        {
            throw new Exception("Controller class not found in file:$controllerFilePath class:$controllerName");
        }
    }
    else
    {
        throw new Exception("Controller file not found fileName:$controllerFilePath");
    }
}
catch(Exception $ex)
{
    require_once("views/_shared/error.php");
    echo $ex->getMessage();
}