<?php
require_once("core/baseModel.php");
require_once("db.config.php");

class studentModel extends Model
{
    private static $tableName = "students";
    
    public function rules()
    {
        return ["id","firstName","lastName","birthday","email"];
    }
    
    public function insert()
    {
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $conn->prepare("INSERT INTO `".self::$tableName."` (firstName, lastName, birthday, email) 
            VALUES (:firstname, :lastname, :birthday ,:email)");
            $stmt->bindParam(':firstname', $this->firstName);
            $stmt->bindParam(':lastname', $this->lastName);
            $stmt->bindParam(':birthday', $this->birthday);
            $stmt->bindParam(':email', $this->email);
            
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public static function selectAll()
    {
        $studList = array();
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = "SELECT * FROM `". self::$tableName ."`;";
            foreach ($conn->query($sql) as $row)
            {   
                $student = new studentModel();

                $student->tryMap($row);

                array_push($studList, $student);
            }
            
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        finally
        {
            $conn = null;
        }
        return $studList;
    }
    public static function deleteStudent($id)
    {
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $conn->prepare("DELETE FROM `". self::$tableName ."` WHERE `id` = :id; ");
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        finally
        {
            $conn = null;
        }
    }
    //upgrade
    public static function searchUpStudent($id)
    {
        try 
        {
            $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $toReturn = array();

            $sql = "SELECT * FROM `". self::$tableName ."` WHERE `id` = $id; ";
            foreach ($conn->query($sql) as $row)
            {
                $student = new studentModel();

                $student->tryMap($row);

                array_push($toReturn, $student);
            }       
            return $toReturn;        
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        finally
        {
            $conn = null;
        }
    }
    public static function upgradeStudent()
    {
        try 
        {
            if( $_SERVER["REQUEST_METHOD"] == "POST" &&
                isset($_POST["firstName"]) == TRUE &&
                isset($_POST["lastName"]) == TRUE &&
                isset($_POST["birthday"]) == TRUE &&
                isset($_POST["email"]) == TRUE )
            {
                $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

                $stmt = $conn->prepare("UPDATE `". self::$tableName ."` 
                SET `firstName`= :firstName,`lastName`= :lastName,`email`= :email,`birthday`= :birthday 
                WHERE `id` = :id ");
                $stmt->bindParam(':firstName', $_POST["firstName"]);
                $stmt->bindParam(':lastName', $_POST["lastName"]);
                $stmt->bindParam(':email', $_POST["email"]);
                $stmt->bindParam(':birthday', $_POST["birthday"]);
                $stmt->bindParam(':id', $_POST["id"]);
                
                $stmt->execute();
            }    
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        finally
        {
            $conn = null;
        }
    }
    //
}