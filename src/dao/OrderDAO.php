<?php

require_once dirname(__DIR__) . "/models/Order.php";

class OrderDAO
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function searchByOrderId(string $int)
    {
    }
}
