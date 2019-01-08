<?php
require_once("core/baseModel.php");
require_once("db.config.php");

class accountModel extends Model
{
    private static $tableName = "users";
    
    public function rules()
    {
        return ["id","firstName","lastName","birthday","email"];
    }
    
   
}