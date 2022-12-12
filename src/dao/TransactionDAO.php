<?php
require_once dirname(__DIR__) . "/models/Transaction.php";
class TransactionDAO
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

    public function getModeOfPaymentCount(string $mode): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_transactions WHERE payment_mode = :mode;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":mode", $mode, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetchColumn();
            $this->closeConnection();
            return $result;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getTransactionsCount(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT COUNT(*) FROM ohana_transactions;";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchColumn();
            $this->closeConnection();
            return $result;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function getAllTransactions(): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id";

            $stmt = $this->conn->query($sql);

            $transactions = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);

                    $transactions[] = $existingTransaction;
                }
            }
            $this->closeConnection();
            return $transactions;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByAccountId($id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id AND a.account_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $existingTransactions = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);

                    $existingTransactions[] = $existingTransaction;
                }
            }
            $this->closeConnection();
            return $existingTransactions;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function searchByTransactionId(string $id): mixed
    {
        try {
            $this->openConnection();
            $sql = "SELECT * FROM ohana_transactions a JOIN ohana_account b 
                    WHERE b.account_id = a.account_id AND a.transaction_id=:id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $existingTransaction = null;
            if ($stmt->execute() > 0) {
                while ($transaction = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingTransaction = new Transaction(
                        $transaction["account_id"],
                        $transaction["total_price"],
                        new DateTime($transaction["transaction_date"]),
                        $transaction["transaction_status"],
                        $transaction["payment_confirmation"]
                    );
                    $existingTransaction->setId($transaction["transaction_id"]);
                    $existingTransaction->setFname($transaction["fname"]);
                    $existingTransaction->setMname($transaction["mname"]);
                    $existingTransaction->setLname($transaction["lname"]);
                    $existingTransaction->setNumber($transaction["number"]);
                    $existingTransaction->setEmail($transaction["email"]);
                }
            }
            $this->closeConnection();
            return $existingTransaction;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }

    public function updateStatus(string $id, string $status): mixed
    {
        try {
            $this->openConnection();
            $sql = "UPDATE ohana_transactions
                    SET transaction_status=:status
                    WHERE transaction_id=:id;";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $isUpdated = $stmt->execute() > 0;
            $this->closeConnection();
            return $isUpdated;
        } catch (Exception $e) {
            echo $e;
            return null;
        }
    }
}
