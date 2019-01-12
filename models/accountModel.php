<?php
require_once("core/baseModel.php");
require_once("db.config.php");

class accountModel extends Model
{
    private static $tableName = "users";
    
    public function rules()
    {
        return ["user_email","user_password"];
    }
    public function login()
    {
        try
        {
            if( $_SERVER["REQUEST_METHOD"] == "POST" &&
                isset($_POST["user_email"]) == TRUE &&
                preg_match("/[a-zA-Z._\-0-9]*\@[a-z0-9]*\.[a-z0-9]{3,5}/", $_POST["user_email"]) &&
                isset($_POST["user_password"]) == TRUE  )
            {
                $userLogin = trim(htmlspecialchars($this->user_email));
                $hashedPass = self::hashPass($this->user_password);
                
                $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT `id_user`, `name`, `surname`, `birthday`,`phone`,`user_email`,`user_avatar`,`user_role` FROM `".self::$tableName."`
                                        WHERE `user_email` = '$userLogin' AND `user_password` = '$hashedPass';"); 
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $inside)
                {
                    foreach($inside as $key=>$value)
                    {
                        if(!is_int($key))
                        {
                            $_SESSION["$key"] = $value;
                        }
                    }
                }
            }
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public static function changePhoto()
    {
        try
        {
            $maxSize = 1024*4*1024;
            if( !empty($_FILES["user_avatar"]["size"]) &&
                $_FILES["user_avatar"]["size"] <= $maxSize && 
                preg_match( "/^image\/(jpg|png|jpeg|svg)$/", $_FILES["user_avatar"]["type"]) ){
                    $oldCover = $_SESSION["user_avatar"];
                    $currId = $_SESSION["id_user"];
                    if($oldCover != "/image/default/default_avatar.jpg")
                    {
                        $unLinkStr = mb_substr( $oldCover, 1);
                        unlink($unLinkStr);
                    };
                    $format =  explode("/",$_FILES["user_avatar"]["type"]);
                    $created_covers_url = "image/users_cover/".md5(microtime()).".".$format[1];
                    move_uploaded_file( $_FILES["user_avatar"]["tmp_name"], $created_covers_url);   
                    $created_covers_url = "/$created_covers_url";
                    $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "UPDATE `users` SET `user_avatar`= '$created_covers_url' WHERE `id_user`=$currId";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $_SESSION["user_avatar"] = "$created_covers_url";
                };
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
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