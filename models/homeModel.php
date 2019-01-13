<?php
require_once("core/baseModel.php");
require_once("db.config.php");

class homeModel extends Model
{
    private static $tableName = "product";
    
    public function rules()
    {
        return ["id_product", "name", "vendor", "quantity", "description",
                "price","photo_product"];
    }
    
    public static function loadProduct($quantity = 0)
    {
        try
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM ".self::$tableName." 
                                    LIMIT $quantity ,6"); 
            $stmt->execute();
            $toReturn = [];
            foreach($stmt->fetchAll() as $value)
            {
                $product = new homeModel();
                $product->tryMap($value);
                
                array_push($toReturn, json_encode($product));
            }
            return $toReturn;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
   
}