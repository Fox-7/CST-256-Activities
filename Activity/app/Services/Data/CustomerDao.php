<?php
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class CustomerDao
{
    public function __construct($db){
        $this->db = $db;
    }
    
    public function addCustomer($firstName, $lastName)
    {
        DB::table('customer')->insert([
            'FirstName' => $firstName, 'LastName' => $lastName
        ]);
    }
}
