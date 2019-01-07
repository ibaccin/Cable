<?php
class Model
{
    public function tryMap($data)
    {
        $rules = $this->rules();
        foreach($rules as $key => $field)
        {
            $this->{$field} = $data[$field];
        }
        
        return true;
    }
    
    public function validate()
    {
        if(empty($this->name) || empty($this->password))
        {
            return false;
        }
        
        return true;
    }
    const  SALT = "orinal_name_for_salt";
    public static function hashPass($pass)
    {
        return md5(self::SALT.sha1(self::SALT.$pass.self::SALT).self::SALT);
    }
    //auth Components
}