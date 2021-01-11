<?php
namespace App\Services\Data;

use \PDO;
use PDOException;
use App\Services\Utility\DatabaseException;
use App\Models\UserModel;

class SecurityDAO
{
    private $db = NULL;
    
    public function __construct($db){
        $this->db = $db;
    }
    
    public function findByUser(UserModel $user){
        
        try{
            $name = $user->getUsername();
            $pw = $user->getPassword();
            $stmt = $this->db->prepare('SELECT ID, USERNAME, PASSWORD FROM USERS WHERE USERNAME = :username AND PASSWORD = :password');
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $pw);
            $stmt->execute();
            
    
            if ($stmt->rowCount() == 1){
                return true;
            } else {
                return false;
            }
            
        } catch (PDOException $e){
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}