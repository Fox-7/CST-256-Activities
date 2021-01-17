<?php
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Services\Data\CustomerDao;
use App\Services\Data\OrderDao;

class OrderService
{
    public function createOrder($firstName, $lastName, $product)
    {
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        
        DB::autocommit(FALSE);
        DB::begin_transaction();
        
        $orderDao = new OrderDAO();
        $customerDao = new CustomerDAO();
        $id = $customerDao->addCustomer($firstname, $lastname);
        $orderDao->addOrder($product, $id);
        DB::commit();
    }
}

