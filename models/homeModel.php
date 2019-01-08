<?php
require_once("core/baseModel.php");
require_once("db.config.php");

class homeModel extends Model
{
    private static $tableName = "students";
    
    public function rules()
    {
        return ["id","firstName","lastName","birthday","email"];
    }
    
   
}