<?php
namespace App\Services\Data;

use PDO;
use PDOException;
use App\Services\Utility\DatabaseException;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;

class SecurityDAO
{

    private $db = NULL;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findByUser(UserModel $user)
    {
        Log::info("Entering SecurityDAO.findByUser()");
        try {
            $name = $user->getUsername();
            $pw = $user->getPassword();
            $stmt = $this->db->prepare('SELECT ID, USERNAME, PASSWORD FROM USERS WHERE USERNAME = :username AND PASSWORD = :password');
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $pw);
            $stmt->execute();
            
            if ($stmt->rowCount() == 1) {
                return true;
                Log::info("Exiting SecurityDAO.findByUser()");
            } else {
                return false;
            }
        } catch (PDOException $e) {
            Log::error("Exception SecurityDAO::findByUser()" . $e->getMessage());
        }
    }
}