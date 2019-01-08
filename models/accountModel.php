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





class registerModel extends Model
{
    private static $tableName = "users";
    public static function registrate()
    {
        try 
        {
            if( $_SERVER["REQUEST_METHOD"] == "POST" &&
                isset($_POST["name"]) == TRUE &&
                isset($_POST["surname"]) == TRUE &&
                isset($_POST["birthday"]) == TRUE &&
                isset($_POST["phone"]) == TRUE &&
                isset($_POST["user_email"]) == TRUE &&
                isset($_POST["user_password"]) == TRUE &&
                isset($_POST["confirmPassword"]) == TRUE &&
                ($_POST["user_password"] == $_POST["confirmPassword"]) ){
                    
                    $hashedPass = self::hashPass($_POST["user_password"]);

                    $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $stmt = $conn->prepare("INSERT INTO `".self::$tableName."` (`name`, `surname`, `birthday`, `user_email`, `user_password`, `phone`) 
                    VALUES (:firstname, :lastname, :birthday , :email, :password ,:phone);");

                    $stmt->bindParam(':firstname', $_POST["name"]);
                    $stmt->bindParam(':lastname', $_POST["surname"]);
                    $stmt->bindParam(':birthday', $_POST["birthday"]);
                    $stmt->bindParam(':email', $_POST["user_email"]);
                    $stmt->bindParam(':password', $hashedPass);
                    $stmt->bindParam(':phone', $_POST["phone"]); 
                    
                    $stmt->execute();
            } 
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}