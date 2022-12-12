<?php
require_once dirname(__DIR__) . "/models/Order.php";
class OrderDAO
{
    private ?string $host = null;
    private ?string $name = null;
    private ?string $user = null;
    private ?string $password = null;
    private ?PDO $conn = null;

    public function __construct(string $host, string $name, string $user, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }

    public function openConnection(): void
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name};charset=utf8", $this->user, $this->password);
    }

    public function closeConnection(): void
    {
        $this->conn = null;
    }

    public function searchByTransactionId(string $id): mixed
    {
        try {
            $this->openConnection();
            $this->openConnection();
            $sql = "SELECT * FROM ohana_orders a JOIN ohana_pet_profiles b
                    WHERE b.pet_id = a.pet_id AND a.transaction_id=:id;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $existingOrders = null;
            if ($stmt->execute() > 0) {
                while ($order = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingOrder = new Order(
                        $order["order_type"],
                        $order["transaction_id"],
                        $order["pet_id"],
                        $order["pet_name"],
                        $order["pet_image"],
                        $order["pet_price"]
                    );
                    $existingOrder->setId($order["order_id"]);
                    $existingOrder->setPetSex($order["pet_sex"]);
                    $existingOrder->setPetColor($order["pet_color"]);
                    $existingOrder->setPetTrait($order["pet_trait"]);

                    $existingOrders[] = $existingOrder;
                }
            }
            $this->closeConnection();
            return $existingOrders;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByPetId(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_orders a JOIN ohana_pet_profiles b
                    WHERE b.pet_id = a.pet_id AND a.pet_id = :id AND NOT b.pet_status = 'AVAILABLE'
                    LIMIT 1;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $existingOrder = null;
            if ($stmt->execute() > 0) {
                while ($order = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingOrder = new Order(
                        $order["order_type"],
                        $order["transaction_id"],
                        $order["pet_id"],
                        $order["pet_name"],
                        $order["pet_image"],
                        $order["pet_price"]
                    );
                    $existingOrder->setId($order["order_id"]);
                    $existingOrder->setPetSex($order["pet_sex"]);
                    $existingOrder->setPetColor($order["pet_color"]);
                    $existingOrder->setPetTrait($order["pet_trait"]);
                }
            }
            $this->closeConnection();
            return $existingOrder;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
