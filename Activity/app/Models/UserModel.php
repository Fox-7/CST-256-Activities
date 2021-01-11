<?php

namespace App\Models;

class UserModel
{
    private $username;
    private $password;
    
    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
    //getters and setters
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @return mixed
     */
    public function setUsername($username)
    {
        return $this->username;
    }
    
    /**
     * @return mixed
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
}