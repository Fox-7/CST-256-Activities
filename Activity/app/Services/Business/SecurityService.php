<?php
namespace App\Services\Business;

use \PDO;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use Illuminate\Support\Facades\Log;

class SecurityService
{
    public function login(UserModel $user){
        Log::info("Entering SecurityService::index()");
            
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        $db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        
        $service = new SecurityDAO($db);
        $flag = $service->findByUser($user);
        
        $db = null;
        
        return $flag;
        Log::info("Exiting SecurityService::index()");
        
    }
}