<?php
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class OrderDao
{
    public function __construct($db){
        $this->db = $db;
    }
    
    public function addOrder($product)
    {
        DB::table('orders')->insert([
            'Product' => $product, 'Customer_ID' => $id
        ]);
    }
}
